<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Date: 2023/9/6
 * @author George
 * @package App
 * @property integer $id
 * @property string $initiator_id
 * @property string $school_id
 * @property string $email
 * @property integer $expires
 * @property integer $status
 * @property string $signature
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Invitation extends Model
{
    const STATUS_UNREGISTERED = 1;
    const STATUS_REGISTERED = 2;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * Date: 2023/9/6
     * @author George
     * @return BelongsTo
     */
    public function initiator(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'initiator_id', 'id');
    }
}
