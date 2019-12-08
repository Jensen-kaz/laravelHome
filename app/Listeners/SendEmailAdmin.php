<?php

namespace App\Listeners;

use App\Events\SendEmail;
use App\Jobs\SendingEmail;
use App\Mail\CreateComment;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Request;

class SendEmailAdmin
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
     * @param  SendEmail  $event
     * @return void
     */
    public function handle(SendEmail $event)
    {
        $mailData =[
            'commentText' => $event->comment->text,
            'userId' => $event->comment->user_id,
            'articleId' => $event->comment->article_id,
        ];
        $user = Request::user();

        $job = (new SendingEmail($mailData, $user))->onQueue('emails');
        dispatch($job);
    }
}
