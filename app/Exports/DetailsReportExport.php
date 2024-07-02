<?php

namespace App\Exports;

use App\Models\ChasResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DetailsReportExport implements FromCollection, WithHeadings, WithMapping
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
            $resource->created_at->format('d M Y h:i:s'),
            $resource->updated_at->format('d M Y h:i:s'),
            $resource->resource_cost,
            $resource->asset_status,
            $resource->building,
            $resource->specific_area,


        ];
    }
}
