<?php

namespace App\Http\Controllers\Api;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Events\MessageNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

/**
 * Message logic controller
 *
 * Date: 2023/9/9
 * @author George
 * @package App\Http\Controllers\Api
 */
class MessageController extends Controller
{
    /**
     * Fetch the message history by receiver ID.
     *
     * Date: 2023/9/9
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function history(Request $request)
    {
        $this->validate($request, [
            'to' => 'required|string'
        ]);

        $to = $request->get('to');
        $from = Auth::id();
        $size = $request->get('size', 30);

        $query = Message::query()->where(function (Builder $builder) use ($to, $from) {
            $builder->where('from', $from)->where('to', $to);
        })->orWhere(function (Builder $builder) use ($to, $from) {
            $builder->where('from', $to)->where('to', $from);
        })->orderByDesc('created_at');
        $paginator = $query->paginate($size);
        $messages = $paginator->items();
        $paginator->setCollection(collect(array_reverse($messages)));

        return success($paginator);
    }

    /**
     * Send message to specified user.
     *
     * Date: 2023/9/6
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'to' => 'required|string',
            'content' => 'required|string'
        ]);

        $message = new Message();
        $message->from = Auth::id();
        $message->to = $request->get('to');
        $message->content = $request->get('content');
        $message->save();

        // Push notification to websocket channel.
        event(new MessageNotification(Auth::user(), $message));

        return success($message);
    }
}
