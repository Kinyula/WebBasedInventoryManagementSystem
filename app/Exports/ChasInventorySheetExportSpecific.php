<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\ChasResource;

use function Laravel\Prompts\search;

class ChasInventorySheetExportSpecific implements FromCollection, WithHeadings, WithMapping
{
    protected $search;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($search){
        $this->search = $search;
    }

    public function collection()
    {

        return ChasResource::where("specific_area",'ILIKE', '%'.$this->search.'%')->get();

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
