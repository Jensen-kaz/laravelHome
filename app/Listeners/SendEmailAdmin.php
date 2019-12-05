<?php

namespace App\Listeners;

use App\Events\SendEmail;
use App\Mail\CreateComment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
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
        $comment = $event->comment;


        $email = (new CreateComment($comment))->onQueue('emails');
        Mail::to(Request::user())->queue($email);
    }
}
