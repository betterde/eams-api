<?php

namespace App\Http\Controllers\Api\Account;

use App\Student;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

/**
 * Student and Teacher user profile logic controller
 *
 * Date: 2023/9/17
 * @author George
 * @package App\Http\Controllers\Api\Account
 */
class ProfileController extends Controller
{
    /**
     * Fetch account profile.
     *
     * Date: 2023/9/6
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $user = $request->user();

        $guard = Str::lower(class_basename(get_class($user)));

        $attributes = [
            'id' => $user->id,
            'name' => $user->name,
            'guard' => $guard,
            'email' => $user->email
        ];

        if ($user instanceof Student) {
            $attributes['school_id'] = $user->school_id;
        }

        return success($attributes);
    }
}
