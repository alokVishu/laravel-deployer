<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ResetPassword extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   */
  public function __construct(public string $url, public string $user)
  {
    //
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      subject: __('Reset Password'),
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    // return new Content(
    //   view: 'emails.user.reset-password',
    // );
    return new Content(
      view: 'emails.reset-password',
      with: [
        'reset_pwd_url' => $this->url,
        'customer_name' => 'Darling',
        'saas_startup_name' => 'Malamal Weekly',
        'support_email' => 'jaja@ghare_jai_suija.com',
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
