<?php

namespace App\Exports;

use App\Models\AreaOfAllocation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ChasReportExcelExport implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AreaOfAllocation::with(['chasAreas'])->get();
    }

    public function headings(): array
    {
        return [
            'Class/Category',
            'Asset decription/Asset name',
            'Asset quantity',
            'Asset cost ( For 1 resource )',
            'Building',
            'Floor',
            'Department',

        ];
    }

    public function map($resource): array
    {
        // $phone = [];
        // foreach ( $staff->phone as $key ) {
        //     $phone[] = $key->phone_number;
        // }
        return [

            $resource->chasAreas->category->category_type,
            $resource->chasAreas->resource_name,
            $resource->quantity,
            $resource->chasAreas->resource_cost,
            $resource->area_of_allocation,
            $resource->floor,
            $resource->specific_area,
            $resource->department,
        ];
    }
}
