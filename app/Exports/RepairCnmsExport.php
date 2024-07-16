<?php

namespace App\Exports;

use App\Models\CnmsResource;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RepairCnmsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return CnmsResource::with(['category'])->where('repair_status', '=', 'Repair')->get();
    }

    public function headings(): array
    {
        return [
            'Asset id',
            'Description',
            'Asset cost',
            'Class/Category',
            'Building',
            'Floor',
            'Room',
            'Status',
            'Created at',
            'Updated at',
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
            $resource->resource_name,
            $resource->resource_cost,
            $resource->category->category_type,
            $resource->building,
            $resource->specific_area,
            $resource->room,
            $resource->repair_status,
            $resource->created_at->format('d M Y h:i:s'),
            $resource->updated_at->format('d M Y h:i:s'),




        ];
    }
}

