<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AskService extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $service;
    public $body;

    public function __construct($name,$email,$service,$body)
    {
        $this->name=$name;
        $this->email=$email;
        $this->service=$service;
        $this->body=$body;
    }

    public function build()
    {
        return $this->markdown('emails.services');
    }
}
