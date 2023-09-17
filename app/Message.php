<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * The message data model.
 *
 * Date: 2023/9/6
 * @author George
 * @package App
 * @property integer $id
 * @property string $from Sender ID
 * @property string $to Receiver ID
 * @property string $content Message content
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Message extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = ['id'];

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var string[]
     */
    public $timestamps = ['created_at'];
}
