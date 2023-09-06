<?php

namespace App\Http\Controllers\Api\Teacher;

use Exception;
use App\Teacher;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /**
     * Date: 2023/9/5
     * @author George
     * @throws Exception
     */
    public function register(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|alpha_num|confirmed',
        ]);

        $teacher = new Teacher();
        $teacher->id = Uuid::uuid4()->toString();
        $teacher->name = $attributes['name'];
        $teacher->email = $attributes['email'];
        $teacher->password = bcrypt($attributes['password']);
        $teacher->save();

        return success($teacher);
    }
}
