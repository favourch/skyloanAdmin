<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApproveLoan extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loan;
    public function __construct($loan, $user)
    {
        $this->user = $user;
        $this->loan = $loan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Admin.Emails.approve_loan');
    }
}
