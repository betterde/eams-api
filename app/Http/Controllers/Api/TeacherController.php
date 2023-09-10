<?php

namespace App\Http\Controllers\Api;

use App\School;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        $this->validate($request, [
            'school_id' => 'required',
        ]);

        $size = $request->get('size', 15);
        $follow = $request->get('follow');
        $search = $request->get('search');
        $school_id = $request->get('school_id');

        $school = School::findOrFail($school_id);

        $query = $school->teachers();

        if ($search) {
            $query->where(function (Builder $builder) use ($search) {
                $builder->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        if ($follow) {
            $query->with(['followers' => function(BelongsToMany $builder) {
                $builder->where('student_id', Auth::id());
            }]);
        }

        return success($query->paginate($size));
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

    /**
     * Date: 2023/9/10
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function followers(Request $request)
    {
        $user = Auth::user();

        $size = $request->get('size', 15);

        $paginator = [];

        if ($user instanceof Teacher) {
            $paginator = $user->followers()->paginate($size);
        }

        return success($paginator);
    }
}
