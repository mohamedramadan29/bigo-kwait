<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Model;

class SupportMessageFile extends Model
{
    protected $fillable = [
        'ticket_message_id',
        'file'
    ];

    public function ticket_message()
    {
        return $this->belongsTo(TicketMessage::class);
    }
}
