<?php

namespace App\Jobs;

use App\Mail\NewsletterEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendNewsletterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $subscriber;
    protected $details;

    public function __construct($subscriber, $details)
    {
        $this->subscriber = $subscriber;
        $this->details = $details;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->subscriber->email)->send(new NewsletterEmail($this->details));
    }
}
