<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterEmail extends Mailable
{
    private User $user;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;    
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thanks for Registering' . config('app.name','')
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.registerMail',
            with: [
                'user'=> $this->user,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromStorageDisk('public','profile/tb2bDSsAV9c8SkZilYNZG5Kk33q13gZNRNAQrSAk.png'),
        ];
    }
}
