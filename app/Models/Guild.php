<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Guild extends Model
{
    use HasFactory, Notifiable;

    public function routeNotificationForDiscord()
    {
        return $this->message_channel_id;
    }
}
