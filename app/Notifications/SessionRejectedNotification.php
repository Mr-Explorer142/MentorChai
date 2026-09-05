<?php

namespace App\Notifications;

use App\Models\SessionTopic;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SessionRejectedNotification extends Notification
{
    use Queueable;

    public function __construct(public SessionTopic $session) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Session Request Declined')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your session request on "' . $this->session->topic . '" has been declined by ' . $this->session->mentor->name . '.')
            ->line('You can check other available mentors or submit a new request.');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'        => 'session_rejected',
            'message'     => $this->session->mentor->name . ' has declined your session request on "' . $this->session->topic . '".',
            'session_id'  => $this->session->id,
            'mentor_id'   => $this->session->mentor_id,
            'mentor_name' => $this->session->mentor->name,
            'topic'       => $this->session->topic,
        ];
    }
}
