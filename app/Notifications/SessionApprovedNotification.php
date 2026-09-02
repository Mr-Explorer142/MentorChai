<?php

namespace App\Notifications;

use App\Models\SessionTopic;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SessionApprovedNotification extends Notification
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
            ->subject('Session Approved - Please Make Payment')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line('Your session request on "' . $this->session->topic . '" has been approved by ' . $this->session->mentor->name . '.')
            ->action('Make Payment', route('checkout', $this->session->id))
            ->line('Please complete the payment.');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'        => 'session_approved',
            'message'     => $this->session->mentor->name . ' has approved your session on "' . $this->session->topic . '". Please make payment.',
            'session_id'  => $this->session->id,
            'mentor_id'   => $this->session->mentor_id,
            'mentor_name' => $this->session->mentor->name,
            'topic'       => $this->session->topic,
            'checkout_url' => route('checkout', $this->session->id, false),
        ];
    }
}
