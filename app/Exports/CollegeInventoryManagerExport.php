<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CollegeInventoryManagerExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::with(['phone'])->where('role_id', '2')->get();
    }

    public function headings(): array
    {
        return [
            'Username',
            'Email',
            'Phone number',
            'Created at',
            'Updated at'
        ];
    }

    public function map($collegeInventoryManager): array
    {

        foreach ($collegeInventoryManager->phone as $key) {

            $phone = $key->phone_number;

        }

        return [

            $collegeInventoryManager->username,
            $collegeInventoryManager->email,
            $phone,
            $collegeInventoryManager->created_at->diffForHumans(),
            $collegeInventoryManager->updated_at->diffForHumans(),

        ];
    }

    public function fields(): array
    {
        return [
            'username',
            'email',
            'phone_number',
            'created_at',
            'updated_at'
        ];
    }
}
