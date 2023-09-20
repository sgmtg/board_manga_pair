<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;


use App\Mail\NewCommentMail;
use App\Models\User;

class SendNewCommentMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $commenterName;
    protected $postOwnerName;
    protected $url;
    protected $postOwnerEmail;

    /**
     * Create a new job instance.
     */
    public function __construct($commenterName, $postOwnerName, $url, $postOwnerEmail)
    {
    //
    $this->commenterName = $commenterName;
    $this->postOwnerName = $postOwnerName;
    $this->url = $url;
    $this->postOwnerEmail = $postOwnerEmail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->postOwnerEmail)->send(new NewCommentMail($this->commenterName, $this->postOwnerName, $this->url));
    }
}
