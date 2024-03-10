<?php

namespace App\Importer;

use App\Jobs\SendNotificationJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ChargeImporter implements ToArray, WithChunkReading, ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public function array(array $array): void
    {
        SendNotificationJob::dispatch($array);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
