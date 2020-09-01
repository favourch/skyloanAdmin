<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectLoan extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loan;
    public $reason;
    public function __construct($loan, $user, $reason)
    {
        $this->user = $user;
        $this->loan = $loan;
        $this->reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Admin.Emails.reject_loan');
    }
}
