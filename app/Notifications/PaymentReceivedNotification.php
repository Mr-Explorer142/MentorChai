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
            ->subject('পেমেন্ট প্রাপ্ত হয়েছে — সেশন নিশ্চিত')
            ->greeting('হ্যালো ' . $notifiable->name . '!')
            ->line($this->session->student->name . ' "' . $this->session->topic->topic . '" বিষয়ক সেশনের পেমেন্ট সম্পন্ন করেছেন।')
            ->action('সেশনে যুক্ত হন', $roomUrl)
            ->line('সেশনের জন্য প্রস্তুত থাকুন।');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'type'         => 'payment_received',
            'message'      => $this->session->student->name . ' পেমেন্ট সম্পন্ন করেছেন। সেশন নিশ্চিত।',
            'session_id'   => $this->session->id,
            'session_code' => $this->session->session_code,
            'room_url'     => '/live-session?room=' . $this->session->session_code,
            'student_id'   => $this->session->student_id,
            'student_name' => $this->session->student->name,
            'topic'        => $this->session->topic->topic,
        ];
    }
}
