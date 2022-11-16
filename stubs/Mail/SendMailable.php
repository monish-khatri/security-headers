<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userFrom;
    public $blog;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userFrom, $blog, $comment)
    {
        $this->userFrom = $userFrom;
        $this->blog = $blog;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Comment Added')->view('emails.comment_action', [
            'user'=>$this->userFrom, 'blog'=>$this->blog, 'comment'=>$this->comment
        ]);
    }
}
