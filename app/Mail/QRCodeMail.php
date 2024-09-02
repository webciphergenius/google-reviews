<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QRCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $qrCodePath;

    public function __construct($user, $qrCodePath)
    {
        $this->user = $user;
        $this->qrCodePath = $qrCodePath;
    }

    public function build()
    {
        return $this->view('emails.qrcode')
                    ->subject('Your QR Code')
                    ->attach($this->qrCodePath, [
                        'as' => 'qrcode.png',
                        'mime' => 'image/png',
                    ]);
    }
}