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

    private $chasResource;
    public function __construct()
    {
        $this->chasResource = ChasResource::with(['category', 'user'])->get();
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $chasResources = ChasResource::create([
                'store manager' => $row['user_id'],
                'category' => $row['category_id'],
                'resource' => $row['resource_name'],
                'status' => $row['status'],
                'college' => $row['college_name']

            ]);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
