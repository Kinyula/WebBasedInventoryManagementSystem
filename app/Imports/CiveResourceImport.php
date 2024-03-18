<?php

namespace App\Imports;

use App\Models\CiveResource;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CiveResourceImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    private $civeResource;
    public function __construct()
    {
        $this->civeResource = CiveResource::with(['category', 'user'])->get();
    }
    /**
     * @param Collection $collection
     */

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $civeResources = CiveResource::create([
                'user' => $row['user_id'],
                'category' => $row['category_id'],
                'resource' => $row['resource_name'],
                'status' => $row['status'],
                'college' => $row['college_name']

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 5000;
    }
}
