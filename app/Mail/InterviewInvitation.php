<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InterviewInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $freelancer;
    public $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($freelancer, $project)
    {
        $this->freelancer = $freelancer;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.interview_invitation')
                    ->subject('Interview Invitation')
                    ->with([
                        'freelancerName' => $this->freelancer->name,
                        'projectName' => $this->project->projectName,
                    ]);
    }
}
