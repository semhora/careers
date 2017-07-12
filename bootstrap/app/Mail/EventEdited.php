<?php

namespace App\Mail;

use App\Models\Events;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventEdited extends Mailable
{
    use Queueable, SerializesModels;

    protected $events;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Events $events, $email )
    {
        $this->events = $events;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.edited')
            ->subject('Evento editado')
            ->with([
                'email' => $this->email,
                'name' => $this->events->name,
                'url'  => url('panel/events/details/' . $this->events->id)
            ]);
    }
}
