<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use NotificationChannels\Discord\DiscordChannel; // <-- Notice this line
use NotificationChannels\Discord\DiscordMessage; // <-- Notice this line

class SlideIntoDm extends Notification
{
    use Queueable;

    public $discordUserId;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($discordUserId)
    {
        $this->discordUserId = $discordUserId;
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
        return "Hey <@$this->discordUserId> 👋🏾 I'm a bot, sliding into your DMs 😏";
    }
}
