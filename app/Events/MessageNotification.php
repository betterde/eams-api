<?php

namespace App\Events;

use App\Message;
use App\Teacher;
use App\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MessageNotification implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Teacher|Student $sender
     */
    public $sender;

    /**
     * @var Message $message
     */
    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sender, Message $message)
    {
        $this->sender = $sender;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [new PrivateChannel('notify.' . $this->message->to), new PrivateChannel('message.' . $this->message->to)];
    }

    /**
     * Date: 2023/9/7
     * @author George
     * @return string
     */
    public function broadcastAs()
    {
        return 'MessageNotification';
    }

    /**
     * Date: 2023/9/7
     * @author George
     * @return Message[]
     */
    public function broadcastWith(): array
    {
        return [
            'sender' => [
                'id' => $this->sender->id,
                'name' => $this->sender->name
            ],
            'message' => $this->message->toArray(),
        ];
    }
}
