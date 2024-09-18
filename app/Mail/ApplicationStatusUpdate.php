<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $application;
    public $statusMessage;
    public $rating;

    public function __construct($application, $statusMessage, $rating)
    {
        $this->application = $application;
        $this->statusMessage = $statusMessage;
        $this->rating = $rating; // Nhận thêm rating
    }

    public function build()
    {
        return $this->subject('Cập nhật trạng thái hồ sơ')
                    ->view('pages.email.application_status_update');
    }
}
