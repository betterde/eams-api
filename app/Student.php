<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Date: 2023/9/9
 * @author George
 * @package App
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $school_id
 * @property string $password
 */
class Student extends Authenticatable
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
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_student_pivot', 'student_id', 'teacher_id')
            ->withPivot('created_at');
    }
}
