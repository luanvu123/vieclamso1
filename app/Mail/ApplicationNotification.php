<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    /**
     * Create a new message instance.
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    /**
     * Build the message.
     */
   public function build()
{
    $candidate = $this->application->candidate;

    return $this->subject('Ứng viên đã ứng tuyển vào công việc của bạn')
        ->view('employer.emails_application_notification')
        ->with([
            'jobTitle' => $this->application->jobPosting->title,
            'candidateName' => $candidate->name,
            'candidateEmail' => $candidate->email,
            'candidatePhone' => $candidate->phone_number_candidate,
            'candidateFullname' => $candidate->fullname_candidate,
            'candidateAvatar' => $candidate->avatar_candidate,
            'candidateGender' => $candidate->gender,
            'candidateAddress' => $candidate->address,
            'candidateSkill' => $candidate->skill,
            'candidatePosition' => $candidate->position,
            'candidateLinkedin' => $candidate->linkedin,
            'candidateStory' => $candidate->story,
            'candidateDob' => $candidate->dob ? date('d/m/Y', strtotime($candidate->dob)) : null,
            'candidateLevel' => $candidate->level,
            'candidateDesiredLevel' => $candidate->desired_level,
            'candidateDesiredSalary' => $candidate->desired_salary,
            'candidateEducation' => $candidate->education_level,
            'candidateExperience' => $candidate->years_of_experience,
            'candidateWorkingForm' => $candidate->working_form,
            'cvPath' => $this->application->cv_path ? asset('storage/' . $this->application->cv_path) : null,
            'applicationIntroduction' => $this->application->introduction,
        ]);
}
}
