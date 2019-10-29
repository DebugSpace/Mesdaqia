<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class orderpassword extends Mailable
{
    use Queueable, SerializesModels;
    public $pass;
    public $name;
    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$pass,$name)
    {
        $this->pass = $pass;
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders.shipped')->with(['id'=>$this->id,'message_Pass'=>$this->pass,'Name'=>$this->name]);
    }
}
