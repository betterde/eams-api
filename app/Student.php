<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Date: 2023/9/5
     * @author George
     */
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'teacher_student_pivot', 'student_id', 'teacher_id');
    }
}
