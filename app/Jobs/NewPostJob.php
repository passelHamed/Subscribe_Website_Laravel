<?php

namespace App\Jobs;

use App\Mail\NewPostMail;
use App\Mail\postsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NewPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;
    public $emailPost;
    public function __construct($data , $emailPost)
    {
        $this->data = $data;
        $this->emailPost = $emailPost;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->emailPost as $email)
        {
            Mail::to($email->user->email)->send(new NewPostMail($this->data));
        }
    }
}
