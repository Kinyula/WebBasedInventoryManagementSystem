<?php

namespace App\Imports;

use App\Models\Asset;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetImport implements ToCollection , WithChunkReading, WithHeadingRow, ShouldQueue
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            $asset = Asset::create([
                'category_id' => $row['category_id'],
                'asset_type' => $row['asset_type'],
                'asset_status' => $row['asset_status'],
                'asset_cost' => $row['asset_cost'],
                'supplier_id' => $row['supplier_id']

            ]);

        }
    }

    public function chunkSize(): int
    {

        return 100;
    }
}
