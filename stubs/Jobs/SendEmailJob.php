<?php

namespace App\Jobs;

use App\Mail\SendMailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $userFrom;
    public $userTo;
    public $blog;
    public $comment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($userFrom, $userTo, $blog, $comment)
    {
        $this->userFrom = $userFrom;
        $this->userTo = $userTo;
        $this->blog = $blog;
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->userTo->email != $this->userFrom->email) {
            Mail::to($this->userTo->email)->send(new SendMailable($this->userFrom, $this->blog, $this->comment));
        }
    }
}
