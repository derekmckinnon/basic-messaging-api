<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMessagePostRequest;
use App\Http\Requests\ViewMessagesGetRequest;
use App\Models\Message;
use Illuminate\Database\Eloquent\Builder;

class MessagesController extends Controller
{
    public function index(ViewMessagesGetRequest $request): array
    {
        $user_id_a = $request->validated('user_id_a');
        $user_id_b = $request->validated('user_id_b');

        $messages = Message::query()
            ->where(function (Builder $query) use ($user_id_a, $user_id_b) {
                $query->where('sender_user_id', $user_id_a)->where('receiver_user_id', $user_id_b);
            })
            ->orWhere(function (Builder $query) use ($user_id_b, $user_id_a) {
                $query->where('sender_user_id', $user_id_b)->where('receiver_user_id', $user_id_a);
            })
            ->orderBy('created_at')
            ->get();

        return ['messages' => $messages];
    }

    public function send(SendMessagePostRequest $request): array
    {
        Message::query()->create($request->validated());

        return [
            'success_code' => '200',
            'success_title' => 'Message Sent',
            'success_message' => 'Message was sent successfully',
        ];
    }
}
