<?php

namespace App\Http\Controllers\Api;

use Exception;
use Throwable;
use App\School;
use App\Member;
use App\Teacher;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Http\Controllers\Api\School
 */
class SchoolController extends Controller
{
    /**
     * Date: 2023/9/6
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $size = $request->get('size', 15);

        $user = Auth::user();

        $paginator = [];

        if ($user instanceof Teacher) {
            $paginator = $user->schools()->with(['manager' => function($query) {
                return $query->first();
            }])->orderByDesc('created_at')->paginate($size);
        }

        return success($paginator);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:schools,name'
        ]);

        $school = DB::transaction(function () use ($request) {
            $school = School::create([
                'id' => Uuid::uuid4()->toString(),
                'name' => $request->get('name'),
                'status' => School::STATUS_PENDING,
                'manager_id' => Auth::id()
            ]);

            $school->teachers()->attach(Auth::id(), ['role' => Member::ROLE_MANAGER]);

            return $school;
        });

        return stored($school);
    }

    /**
     * Get the specified resource.
     *
     * Date: 2023/9/4
     * @author George
     * @param School $school
     * @return JsonResponse
     */
    public function show(School $school)
    {
        $manager = $school->manager()->first();
        $school->manager = $manager;
        return success($school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param School $school
     * @return JsonResponse
     */
    public function update(Request $request, School $school)
    {
        $attributes = $this->validate($request, [
            'name' => 'required|string',
        ]);

        $school->update($attributes);

        return updated($school);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(School $school)
    {
        if (Auth::id() != $school->manager_id) {
            return failed("You don't have permission to delete schools created by others", 422);
        }

        if ($school->students()->count() > 0) {
            return failed('There are students in the current school and cannot be deleted!', 422);
        }

        if ($school->teachers()->count() > 0) {
            return failed('There are teachers in the current school and cannot be deleted!', 422);
        }

        if ($school->delete()) {
            return deleted();
        } else {
            return internalError();
        }
    }
}
