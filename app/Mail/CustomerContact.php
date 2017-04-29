<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $phone;
    /**
     * @var string
     */
    public $sender;
    /**
     * @var string
     */
    public $message;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $phone
     * @param $sender
     * @param $message
     */
    public function __construct($name, $phone, $sender, $message)
    {
        $this->name    = $name;
        $this->phone   = $phone;
        $this->sender  = $sender;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = Carbon::now('America/Chicago')->toDayDateTimeString();

        return $this->from($this->sender)
            ->markdown('emails.contact')
            ->with(compact('date'));
    }
}
