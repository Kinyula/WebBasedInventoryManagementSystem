<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\ChasResource;

class SummaryReportExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ChasResource::with(['category'])->distinct('category_id')->get();
    }

    public function headings(): array
    {
        return [
            'Class/Category',
            'Quantity',
            'Cost',

        ];
    }

    public function map($resource): array
    {
        // $phone = [];
        // foreach ( $staff->phone as $key ) {
        //     $phone[] = $key->phone_number;
        // }
        return [

            $resource->category->category_type,
            $resource->groupBy('category_id')->where('category_id' , $resource->category_id)->count(),
            $resource->groupBy('category_id')->where('category_id' , $resource->category_id)->count() * $resource->resource_cost,
        ];
    }
}
