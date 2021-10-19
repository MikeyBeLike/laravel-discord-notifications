<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class DiscordUser extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;

    protected $guarded = ['id'];

    public function routeNotificationForDiscord()
    {
        return $this->discord_private_channel_id;
    }
}
