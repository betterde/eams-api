<?php

namespace App\Http\Controllers\Api\Auth;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Http\Controllers\Api\Auth
 */
class SignInController extends Controller
{
    use AuthenticatesUsers;

    /**
     * SignIn with email and password.
     *
     * Date: 2023/9/5
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function signInWithPassword(Request $request)
    {
        $this->validate($request, [
            'guard' => ['required', Rule::in(['teacher', 'student'])],
            'username' => 'required|email',
            'password' => 'required|alpha_num'
        ]);

        $client = new Client(['verify' => false]);

        $url = $request->root() . '/api/auth/token';

        try {
            $response = $client->post($url, ['form_params' => [
                'grant_type' => 'password',
                'client_id' => config('auth.passport.client_id'),
                'client_secret' => config('auth.passport.client_secret'),
                'username' => $request->get('username'),
                'password' => $request->get('password'),
                'guard' => $request->get('guard')
            ]]);

            $content = json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            return internalError($e->getMessage());
        }

        return success($content);
    }

    public function signInWithLine(Request $request)
    {
        
    }

    public function SignInWithSocialCallback(Request $request)
    {
        
    }
}
