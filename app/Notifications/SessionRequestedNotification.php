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
            ->subject('New Session Request - ' . $this->session->topic)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->line($this->session->student->name . ' has sent you a session request on "' . $this->session->topic . '".')
            ->line('Note: ' . ($this->session->note ?? 'No notes'))
            ->line('Medium: ' . ($this->session->student->profile->preferred_teaching_medium ?? ' - '))
            ->line('Language: ' . ($this->session->student->profile->preferred_language ?? ' - '))
            ->line('Learning Style: ' . ($this->session->student->profile->learning_style ?? 'Not provided'))
            ->action('View Request', url('/dashboard/mentor'))
            ->line('Please respond quickly.');
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
            'message'     => $this->session->student->name . ' has requested a session on "' . $this->session->topic . '"',
            'session_id'  => $this->session->id,
            'student_id'  => $this->session->student_id,
            'student_name' => $this->session->student->name,
            'topic'       => $this->session->topic,
            'note'        => $this->session->note,
            'learning_style' => $this->session->student->profile->learning_style ?? '',
            'preferred_teaching_medium' => $this->session->student->profile->preferred_teaching_medium ?? '',
            'preferred_language' => $this->session->student->profile->preferred_language ?? '',
        ];
    }
}
