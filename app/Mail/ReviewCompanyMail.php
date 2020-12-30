<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewCompanyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $url)
    {
        $this->data=$data;
        $this->url=$url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.reviewCompany');
    }
}
