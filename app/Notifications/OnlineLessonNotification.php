<?php

namespace App\Notifications;

use App\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OnlineLessonNotification extends Notification
{
    use Queueable;

    private $lessons;

    /**
     * Create a new notification instance.
     *
     * @param $lessons
     */
    public function __construct($lessons)
    {
        $this->lessons = $lessons;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (count($this->lessons) > 1) {
            $message = (new MailMessage);
            $message->from('no-reply@limix.eu', 'Maxikov inteligentný systém');
            $message->subject("Prehľad dneskajších hodín");
            $message->line('Dnes Ťa čakajú tieto hodiny:');
            foreach ( $this->lessons as $lesson ) {
                $message->line("- **{$lesson->name}** ({$lesson->start} - {$lesson->end})");
            }
            return $message;
        } else {
            $this->lessons = $this->lessons->first();
            return (new MailMessage)
                ->from('no-reply@limix.eu', 'Maxikov inteligentný systém')
                ->subject("O 10 minút ti začína {$this->lessons->name}!")
                ->line('O 10 minút ti začína online hodina z predmetu **' . $this->lessons->name . '**!')
                ->line("Hodina začína o **{$this->lessons->start}** a končí o **{$this->lessons->end}**.")
                ->action('Klikni sem pre pripojenie na online hodinu', $this->lessons->meet_link ?? 'https://classroom.google.com/u/2/h');
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
