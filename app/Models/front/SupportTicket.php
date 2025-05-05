<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    protected $fillable = [
        'user_id',
        'sender_username',
        'receiver_username',
        'ticket_subject',
        'last_message',
        'last_time_message',
        'is_read',
        'is_closed',
    ];

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
}
