<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\School;
use App\Teacher;
use App\Invitation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\RegisterInvitation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\ValidationException;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Http\Controllers\Api\Teacher
 */
class InvitationController extends Controller
{
    public function index(Request $request)
    {
        $size = $request->get('size', 15);
        $query = Invitation::query();
        $query->with('initiator');

        $query->where('initiator_id', Auth::id());

        $query->when($request->get('school_id'), function (Builder $query, $schoolID) {
            return $query->where('school_id', $schoolID);
        });

        $query->when($request->get('status'), function (Builder $query, $status) {
            return $query->where('status', $status);
        });

        $query->when($request->get('account'), function (Builder $query, $account) {
            return $query->where('account', 'like', "%$account%");
        });

        $query->orderByDesc('created_at');
        return success($query->paginate($size));
    }

    /**
     * Create invitation resource
     *
     * Date: 2020/5/11
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     * @author George
     */
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'email' => ['required', 'email', 'unique:invitations'],
            'school_id' => ['required', 'string']
        ]);

        $school = School::findOrFail($attributes['school_id']);

        $user = $request->user();
        $attributes['initiator_id'] = Auth::id();
        $expires = now()->addMinutes(30);

        $parameters = [
            'email' => $attributes['email'],
            'school' => $attributes['school_id'],
            'expires' => $expires->getTimestamp(),
            'initiator' => $attributes['initiator_id']
        ];

        ksort($parameters);

        $signature = hash_hmac('sha256', URL::route('auth.signup', $parameters, false), config('app.key'));

        $url = URL::route('auth.register', $parameters + ['signature' => $signature], false);

        $attributes['expires'] = $expires->getTimestamp();
        $attributes['signature'] = Str::after($url, 'signature=');


        $invitation = Invitation::create($attributes);

        $teacher = new Teacher(['email' => $attributes['email']]);
        $teacher->notify(new RegisterInvitation([
            'inviter' => $user->name,
            'school' => $school->name,
            'url' => url(str_replace('/api/teacher', '', $url))
        ]));

        return success($invitation);
    }

    /**
     * Get invitation resource by id
     *
     * Date: 2020/5/12
     * @param Invitation $invitation
     * @return JsonResponse
     * @author George
     */
    public function show(Invitation $invitation)
    {
        return success($invitation);
    }

    /**
     * Delete invitation resource by id
     *
     * Date: 2020/5/12
     * @param Invitation $invitation
     * @return JsonResponse
     * @throws Exception
     * @author George
     */
    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        return deleted();
    }
}
