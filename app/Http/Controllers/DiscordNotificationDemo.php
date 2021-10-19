<?php

namespace App\Http\Controllers;

use App\Models\DiscordUser;
use App\Models\Guild;
use App\Notifications\NewDonation;
use App\Notifications\SlideIntoDm;
use Illuminate\Http\Request;

class DiscordNotificationDemo extends Controller
{

    private $discordUserId = 0; // TODO: fill this in
    private $discordRoleId = 0; // TODO: fill this in

    public function index()
    {
        $guild = Guild::findOrFail(2);
        $guild->notify(new NewDonation($this->discordUserId, $this->discordRoleId));
    }

    public function slide_into_dm()
    {
        $discordUser = DiscordUser::find(1);
        $discordUser->notify(new SlideIntoDm($this->discordUserId));
    }
}
