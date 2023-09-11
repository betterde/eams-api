<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 * @property Teacher $manager
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
    protected $fillable = ['id', 'name', 'status', 'manager_id'];

    /**
     * Date: 2023/9/6
     * @author George
     * @return BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'manager_id', 'id');
    }

    /**
     * Get teacher resources of the school.
     *
     * Date: 2023/9/4
     * @author George
     * @return BelongsToMany
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'members', 'school_id', 'teacher_id')->withPivot('role');
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