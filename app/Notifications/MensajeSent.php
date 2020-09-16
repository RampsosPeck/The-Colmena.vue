<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MensajeSent extends Notification
{
    protected $mensaje;

    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->greeting('Hola! '.$notifiable->fullname)
                    ->subject('Mensaje recibido desde el sitio web de LA COLMENA')
                    ->line('Has recibido un mensaje.')
                    ->action('Click aquí para ver la notificación', url('/notifications'))
                    ->line('Gracias por utilizar nuestro sitio web!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //return $this->mensaje->toArray();
        return [
            'sms' => $this->mensaje->toArray(),
            'senduser' => $this->mensaje->sender->fullname,
        ];
    }
}
