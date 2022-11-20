<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $subject;
    public $email;
    public $body;

    public function __construct($name,$email,$subject,$body)
    {
        $this->name=$name;
        $this->subject=$subject;
        $this->email=$email;
        $this->body=$body;
    }


    public function build()
    {
        return $this->markdown('emails.contact');
    }
}
