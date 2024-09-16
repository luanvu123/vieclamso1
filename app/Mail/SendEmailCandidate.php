<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCandidate extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $emailMessage;
    public $attachmentName;

    /**
     * Create a new message instance.
     *
     * @param  string  $subject
     * @param  string  $message
     * @param  string|null  $attachmentPath
     * @return void
     */
    public function __construct($subject, $message, $attachmentPath = null)
    {
        $this->subject = $subject;
        $this->emailMessage = $message;
        $this->attachmentName = $attachmentPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->subject)
            ->view('admin.about.send_email')
            ->with([
                'emailMessage' => $this->emailMessage,
            ]);

        if ($this->attachmentName) {
            $attachmentPath = storage_path($this->attachmentName);
            if (file_exists($attachmentPath)) {
                $mail->attach($attachmentPath);
            }
        }

        return $mail;
    }
}
