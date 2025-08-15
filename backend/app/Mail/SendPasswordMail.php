<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $userData;
    private $text;

    public function __construct($name, $data, $isAdminUser = null)
    {
        $this->name = $name;
        $this->userData = $data;
        $roleName = ['role' => $data['role']];
        $this->text = $this->getText($isAdminUser, $roleName);
    }

    private function getText($isAdminUser, $roleName)
    {
        $text = __('profile.newUser_textUser', $roleName);
        if($isAdminUser){
            $text = __('profile.newUser_textAdmin', $roleName);
        }
        return $text;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('profile.newUser_data'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.send-password',
            with: [
                'name' => $this->name,
                'user' => $this->userData,
                'text' => $this->text,
            ],
        );
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
