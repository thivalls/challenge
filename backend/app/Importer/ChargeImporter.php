<?php

namespace App\Importer;

use App\Jobs\SendNotificationJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ChargeImporter implements ToArray, WithChunkReading, ShouldQueue
{
    public function array(array $array)
    {
        SendNotificationJob::dispatch($array);
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
