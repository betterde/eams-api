<?php

namespace App\Http\Controllers\Api\Auth;

use Exception;
use App\Member;
use App\Teacher;
use Carbon\Carbon;
use App\Invitation;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * Sign up logic controller
 *
 * Date: 2023/9/7
 * @author George
 * @package App\Http\Controllers\Api\Auth
 */
class SignUpController extends Controller
{
    /**
     * The teacher sign up and invitation sign up handler
     *
     * Date: 2023/9/7
     * @author George
     * @return JsonResponse
     * @throws Exception
     */
    public function signup(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|alpha_num|confirmed',
        ]);

        try {
            DB::beginTransaction();

            $teacher = new Teacher();
            $teacher->id = Uuid::uuid4()->toString();
            $teacher->name = $attributes['name'];
            $teacher->email = $attributes['email'];
            $teacher->password = bcrypt($attributes['password']);
            $teacher->save();

            $school = $request->get('school');
            $signature = $request->get('signature');

            // If registering by invitation, add the teacher as a member of the school.
            if ($school && $signature) {
                /**
                 * @var Invitation $invitation
                 */
                $invitation = Invitation::query()
                    ->where('email', $request->get('email'))
                    ->where('signature', $signature)
                    ->firstOrFail();

                // If the invitation is valid, the teacher will be added to the school and assigned a default role.
                if ($invitation->status === Invitation::STATUS_UNREGISTERED && $invitation->signature === $request->get('signature') && $invitation->email === $request->get('email')) {
                    $teacher->schools()->attach($school, ['role' => Member::ROLE_STAFFER, 'created_at' => Carbon::now()]);

                    $invitation->status = Invitation::STATUS_REGISTERED;
                    $invitation->save();
                }
            }

            DB::commit();
            return success($teacher);
        } catch (Exception $e) {
            DB::rollBack();
            return internalError($e->getMessage());
        }
    }
}
