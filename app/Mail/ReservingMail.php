<?php

namespace App\Mail;
use App\Customr;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReservingMail extends Mailable
{
    use Queueable, SerializesModels;

 public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Customr $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reservingMail');
    }
}
