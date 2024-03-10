<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ChargeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Charge Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.charge',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
