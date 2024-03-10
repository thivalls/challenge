<?php

namespace App\Jobs;

use App\Mail\ChargeMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNotificationJobBatch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $batch;

    /**
     * Create a new job instance.
     */
    public function __construct($batch)
    {
        $this->batch = $batch;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->batch as $data) {
            if (strpos($data[2], '@') !== false) {
                Mail::to($data[2])->send(new ChargeMail($data));
            }
        }
    }
}
