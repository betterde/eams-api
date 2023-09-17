<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\School;
use App\Member;
use App\Student;
use App\Teacher;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

/**
 * Student logic controller
 *
 * Date: 2023/9/6
 * @author George
 * @package App\Http\Controllers\Api\Student
 */
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $this->validate($request, [
            'school_id' => 'required_if:only_followers,false',
            'only_followers' => 'present',
        ]);

        $size = $request->get('size', 15);
        $onlyFollowers = $request->get('only_followers');
        if ($onlyFollowers == 'true') {
            /**
             * @var Teacher $teacher
             */
            $teacher = Auth::user();

            return success($teacher->followers()->paginate($size));
        }

        $member = Member::query()
            ->where('school_id', $request->get('school_id'))
            ->where('teacher_id', Auth::id())
            ->first();

        if (empty($member)) {
            return failed('Not authorized to view the student data of this school!', 422);
        }

        $query = Student::query()->where('school_id', $request->get('school_id'));

        return success($query->orderByDesc('created_at')->paginate($size));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'password' => 'required|alpha_num|confirmed',
            'school_id' => 'required|string'
        ]);

        $school = School::findOrFail($attributes['school_id']);
        if ($school->status == School::STATUS_PENDING) {
            return failed('The school is currently under review and students cannot be created for the school!', 422);
        }

        if ($school->status == School::STATUS_REJECTED) {
            return failed('School application has been rejected, students cannot be created for this school!', 422);
        }

        $attributes['id'] = Uuid::uuid4()->toString();
        $attributes['password'] = bcrypt($attributes['password']);

        $student = Student::create($attributes);

        return stored($student);
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return JsonResponse
     */
    public function show(Student $student)
    {
        return success($student);
    }
}
