<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\ChasResource;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChasInventorySheetExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */


    public function collection()
    {
        return ChasResource::with(['category'])->get();
    }

    public function headings(): array
    {
        return [
            'ASSET ID',
            'CLASS/CATEGORY',
            'UNIT',
            'QUANTITY',
            'CONDITION',

        ];
    }

    public function map($resource): array
    {
        // $phone = [];
        // foreach ( $staff->phone as $key ) {
        //     $phone[] = $key->phone_number;
        // }
        return [
            $resource->id,
            $resource->category->category_type,
            'pc',
            $resource->groupBy('category_id')->where('category_id' , $resource->category_id)->count(),
            $resource->asset_status
        ];
    }
}
