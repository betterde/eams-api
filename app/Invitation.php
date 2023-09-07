<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Date: 2023/9/6
 * @author George
 * @package App
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
