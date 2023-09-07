<?php

namespace App\Http\Controllers\Api;

use App\School;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Date: 2023/9/7
 * @author George
 * @package App\Http\Controllers\Api\Teacher
 */
class TeacherController extends Controller
{
    /**
     * Date: 2023/9/7
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $size = $request->get('size', 15);

        $this->validate($request, [
            'school_id' => 'required',
        ]);

        $school = School::findOrFail($request->get('school_id'));

        return success($school->teachers()->paginate($size));
    }

    /**
     * Date: 2023/9/7
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function follow(Request $request)
    {
        $this->validate($request, [
            'teacher_id' => 'required',
        ]);

        /**
         * @var Student $student
         */
        $student = Auth::user();

        $student->following()->toggle([$request->get('teacher_id')]);

        return success([]);
    }
}
