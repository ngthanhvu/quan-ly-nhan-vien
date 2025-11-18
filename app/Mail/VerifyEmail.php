<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $verifyUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->verifyUrl = url('/verify-email/' . $user->email_verification_token);
    }

    public function build()
    {
        return $this->subject('Xác minh tài khoản')
                    ->view('emails.verify');
    }
}
