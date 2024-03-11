<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AuthMail extends Mailable
{
    use Queueable, SerializesModels;
    protected User $user;
    protected string $url;
    protected string $action;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, string $url, string $action){
        $this->user = $user;
        $this->url = $url;
        $this->action = $action;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope{
        return new Envelope(
            subject: 'Auth Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {   
        if($this->action === "register"){
            return new Content(
                view: 'email',
                with: [
                    'name' => $this->user->name,
                    'url'  => $this->url,
                    'code' => $this->user->code
                ]
            );
        } else {
            return new Content(
                view: 'auth2f',
                with: [
                    'name' => $this->user->name,
                    'code' => $this->user->code
                ]
            );
        }
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
