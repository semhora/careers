<?php

namespace App\Mail;

use App\Models\Events;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventStatus extends Mailable
{
    use Queueable, SerializesModels;

    protected $events;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( Events $events, $status )
    {
        $this->events = $events;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if( $this->status == 'open' ) {
            $return = [
                'get_status' => 'open',
                'name' => $this->events->name,
                'description' => "O Evento \"{$this->events->name}\" foi ativado.",
                'status' => 'Ativado',
                'url'  => url('panel/events/details/' . $this->events->id)
            ];
        } else {
            $return = [
                'get_status' => 'closed',
                'name' => $this->events->name,
                'description' => "O Evento \"{$this->events->name}\" foi cancelado.",
                'status' => 'Cancelado',
                'url'  => url('panel/events/details/' . $this->events->id)
            ];
        }

        return $this->view('mails.status')
            ->subject('Evento ' . $return['status'])
            ->with( $return );
    }
}
