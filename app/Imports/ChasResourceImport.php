<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\ChasResource;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChasResourceImport implements ToCollection, WithChunkReading, WithHeadingRow, ShouldQueue
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            ChasResource::create([
                'category_id' => $row['category_id'],
                'resource_name' => $row['resource_name'],
                'resource_cost' => $row['resource_cost'],
                'region' => $row['region'],
                'user_id' => $row['user_id'],
                'college_name' => $row['college_name'],
            ]);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
