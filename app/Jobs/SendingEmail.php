<?php

namespace App\Jobs;

use App\Mail\CreateComment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendingEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $mailData;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mailData, $user)
    {
        $this->mailData = $mailData;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @param Request $request
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new CreateComment($this->mailData));
    }
}
