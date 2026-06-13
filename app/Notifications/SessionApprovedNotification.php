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
            ->subject('সেশন অনুমোদিত হয়েছে — পেমেন্ট করুন')
            ->greeting('হ্যালো ' . $notifiable->name . '!')
            ->line('আপনার "' . $this->session->topic . '" বিষয়ক সেশনের অনুরোধ ' . $this->session->mentor->name . ' অনুমোদন করেছেন।')
            ->action('পেমেন্ট করুন', route('checkout', $this->session->id))
            ->line('অনুগ্রহ করে পেমেন্ট সম্পন্ন করুন।');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'        => 'session_approved',
            'message'     => $this->session->mentor->name . ' আপনার "' . $this->session->topic . '" সেশন অনুমোদন করেছেন। পেমেন্ট করুন।',
            'session_id'  => $this->session->id,
            'mentor_id'   => $this->session->mentor_id,
            'mentor_name' => $this->session->mentor->name,
            'topic'       => $this->session->topic,
            'checkout_url' => route('checkout', $this->session->id),
        ];
    }
}
