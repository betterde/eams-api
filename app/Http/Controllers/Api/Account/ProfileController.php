<?php

namespace App\Http\Controllers\Api\Account;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Date: 2023/9/6
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return success([
            'id' => $user->id,
            'name' => $user->name,
            'guard' => Str::lower(class_basename(get_class($user))),
            'email' => $user->email
        ]);
    }
}
