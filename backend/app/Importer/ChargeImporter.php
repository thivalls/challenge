<?php

namespace App\Importer;

use App\Jobs\SendNotificationJob;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ChargeImporter implements ToCollection, WithChunkReading, WithBatchInserts
{

    public function collection(Collection $collection): void
    {
        SendNotificationJob::dispatch($collection);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }
}
