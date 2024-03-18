<?php

namespace App\Exports;

use App\Models\Asset;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Maatwebsite\Excel\Concerns\WithMapping;

// use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AssetExport implements FromCollection, WithHeadings, WithMapping
{

    public function collection()
    {
        return Asset::with(['assetStatus', 'category'])->get();
    }

    public function headings(): array
    {
        return [
            'Category',
            'Asset name',
            'Asset status',
            'Asset unique id',
            'Resource received time',
        ];
    }

    public function map($asset): array
    {

        return [

            $asset->category->category_type,
            $asset->asset_type,
            $asset->assetStatus->status,
            'UDOM-' . time() . '-' . Hash::make($asset->id) . '-assets',
            $asset->updated_at->diffForHumans(),

        ];
    }

    public function fields(): array
    {
        return [
            'category',
            'asset_type',
            'status',
            'id',
            'updated_at'
        ];
    }
}
