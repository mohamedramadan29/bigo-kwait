<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    protected $fillable = [
        'ticket_id',
        'sender_username',
        'receiver_username',
        'message',
        'files',
        'is_read',
    ];

    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class);
    }

    public function files()
    {
        return $this->hasMany(SupportMessageFile::class);
    }
}
