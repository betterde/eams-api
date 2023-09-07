<?php

namespace App\Http\Controllers\Api\Message;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Events\MessageNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Date: 2023/9/6
 * @author George
 * @package App\Http\Controllers\Api\Message
 */
class SendController extends Controller
{
    /**
     * Date: 2023/9/6
     * @author George
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {
        $this->validate($request, [
            'to' => 'required|string',
            'message' => 'required|string'
        ]);

        $message = new Message();
        $message->from = Auth::id();
        $message->to = $request->get('to');
        $message->content = $request->get('message');
        $message->save();

        event(new MessageNotification($message));

        return success([]);
    }
}
