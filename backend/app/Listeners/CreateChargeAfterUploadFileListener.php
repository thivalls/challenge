<?php

namespace App\Listeners;

use App\Events\CreateChargeAfterUploadFileEvent;
use App\Models\Charge;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateChargeAfterUploadFileListener
{
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateChargeAfterUploadFileEvent $event): void
    {
        Charge::create($event->data);
    }
}
