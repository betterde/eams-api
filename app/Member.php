<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * The teacher member data model of the school.
 *
 * Date: 2023/9/17
 * @author George
 * @package App
 */
class Member extends Model
{
    const ROLE_MANAGER = 'manager';
    const ROLE_STAFFER = 'staffer';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['school_id', 'teacher_id', 'role', 'secret', 'active'];
}
