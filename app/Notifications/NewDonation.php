<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Discord\DiscordChannel; // <-- Notice this line
use NotificationChannels\Discord\DiscordMessage; // <-- Notice this line

class NewDonation extends Notification
{
    use Queueable;

    public $discordUserId;
    public $discordRoleId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($discordUserId, $discordRoleId)
    {
        $this->discordUserId = $discordUserId;
        $this->discordRoleId = $discordRoleId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [DiscordChannel::class];
    }

    public function toDiscord($notifiable)
    {
        return DiscordMessage::create($this->getMessage());
    }

    private function getMessage()
    {
        return "A new donation has been made by <@$this->discordUserId>! cc: <@&$this->discordRoleId>";
    }
}
