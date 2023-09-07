<?php

namespace App;

use Carbon\Carbon;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Date: 2023/9/5
 * @author George
 * @package App
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Teacher extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var string[]
     */
    protected $hidden = ['password'];

    /**
     * Date: 2023/9/5
     * @author George
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'teacher_student_pivot', 'teacher_id', 'student_id');
    }

    /**
     * Date: 2023/9/5
     * @author George
     * @return BelongsToMany
     */
    public function schools(): BelongsToMany
    {
        return $this->belongsToMany(School::class, 'members', 'teacher_id', 'school_id')->withPivot('role');
    }
}
