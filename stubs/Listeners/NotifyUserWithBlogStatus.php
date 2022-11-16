<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Events\BlogApprovedRejected;
use App\Models\Blog;

class NotifyUserWithBlogStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BlogApprovedRejected  $event
     * @return void
     */
    public function handle(BlogApprovedRejected $event)
    {
        if (in_array($event->blog->status, [Blog::STATUS_APPROVE, Blog::STATUS_REJECTED])) {
            $user = $event->blog->user;
            Mail::send('emails.blog_action', ['user' => $user, 'blog'=>$event->blog], function ($message) use ($user) {
                $message->from('admin@admin.com', 'MBS['.config('app.name').']');
                $message->subject('Action Performed on you Blog!');
                $message->to($user->email);
            });
        }
    }
}
