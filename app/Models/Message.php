<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function toArray(): array
    {
        return [
            'message_id' => $this->id,
            'sender_user_id' => $this->sender_user_id,
            'message' => $this->message,
            'epoch' => strtotime($this->created_at),
        ];
    }
}
