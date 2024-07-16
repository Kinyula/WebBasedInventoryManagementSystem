<?php

namespace App\Exports;

use App\Models\CnmsResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CnmsDetailsReportExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CnmsResource::with(['category'])->get();
    }

    public function headings(): array
    {
        return [
            'Asset decription/Asset name',
            'Region',
            'Class/Category',
            'Branch/College',
            'Department',
            'Registered date',
            'Acquision date',
            'Cost ( For 1 resource )',
            'Condition/Asset status',
            'Building',
            'Floor'
        ];
    }

    public function map($resource): array
    {
        // $phone = [];
        // foreach ( $staff->phone as $key ) {
        //     $phone[] = $key->phone_number;
        // }
        return [

            $resource->resource_name,
            $resource->region,
            $resource->category->category_type,
            $resource->college_name,
            $resource->department,
            $resource->resource_cost,
            $resource->asset_status,
            $resource->building,
            $resource->specific_area,


        ];
    }
}
