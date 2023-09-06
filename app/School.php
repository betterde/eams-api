<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * The school data model.
 *
 * Date: 2023/9/4
 * @author George
 * @package App
 * @property string $id
 * @property string $name
 * @property integer $status
 * @property string $manager_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class School extends Model
{
    const STATUS_PENDING = 1;
    const STATUS_APPROVED = 2;
    const STATUS_REJECTED = 3;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'status'];

    /**
     * Date: 2023/9/6
     * @author George
     * @return BelongsToMany
     */
    public function manager(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'members', 'school_id', 'teacher_id');
    }

    /**
     * Get teacher resources of the school.
     *
     * Date: 2023/9/4
     * @author George
     * @return HasMany
     */
    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class, 'school_id', 'id');
    }

    /**
     * Get student resources of the school.
     *
     * Date: 2023/9/4
     * @author George
     * @return HasMany
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'school_id', 'id');
    }
}