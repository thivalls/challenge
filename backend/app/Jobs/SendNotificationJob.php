<?php

namespace App\Jobs;

use App\Mail\ChargeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $collection;
    /**
     * Create a new job instance.
     */
    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->collection as $data) {
            if (str_contains($data[2], '@')) {
                Mail::to($data[2])->send(new ChargeMail($data));
            }
        }
    }
}
