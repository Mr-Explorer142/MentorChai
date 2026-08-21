<?php

namespace App\Notifications;

use App\Models\MentoringSession;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentReceivedNotification extends Notification
{
    use Queueable;

    public function __construct(public MentoringSession $session) {}

    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $roomUrl = url('/live-session?room=' . $this->session->session_code);

        return (new MailMessage)
            ->subject('Payment Received - Session Confirmed')
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line($this->session->student->name . ' has completed payment for the session on "' . $this->session->topic->topic . '".')
            ->action('Join Session', $roomUrl)
            ->line('Be ready for the session.');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'         => 'payment_received',
            'message'      => $this->session->student->name . ' has completed payment. Session confirmed.',
            'session_id'   => $this->session->id,
            'session_code' => $this->session->session_code,
            'room_url'     => '/live-session?room=' . $this->session->session_code,
            'student_id'   => $this->session->student_id,
            'student_name' => $this->session->student->name,
            'topic'        => $this->session->topic->topic,
        ];
    }
}
