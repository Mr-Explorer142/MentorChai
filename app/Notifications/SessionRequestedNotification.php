<?php

namespace App\Notifications;

use App\Models\SessionTopic;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SessionRequestedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public SessionTopic $session)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database' ,'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('নতুন সেশন অনুরোধ — ' . $this->session->topic)
            ->greeting('হ্যালো ' . $notifiable->name . '!')
            ->line($this->session->student->name . ' আপনার কাছে "' . $this->session->topic . '" বিষয়ে একটি সেশনের অনুরোধ পাঠিয়েছেন।')
            ->line('নোট: ' . ($this->session->note ?? 'কোনো নোট নেই'))
            ->action('অনুরোধ দেখুন', url('/dashboard/mentor'))
            ->line('অনুগ্রহ করে দ্রুত সাড়া দিন।');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            'type'        => 'session_requested',
            'message'     => $this->session->student->name . ' "' . $this->session->topic . '" বিষয়ে সেশনের অনুরোধ করেছেন',
            'session_id'  => $this->session->id,
            'student_id'  => $this->session->student_id,
            'student_name' => $this->session->student->name,
            'topic'       => $this->session->topic,
            'note'        => $this->session->note,
        ];
    }
}
