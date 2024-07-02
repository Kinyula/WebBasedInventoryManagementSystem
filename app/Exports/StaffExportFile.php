<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StaffExportFile implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::with(['phone'])->whereNot('role_id', '3')->get();
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

    public function map($staff): array
    {
        $phone = [];
        foreach ( $staff->phone as $key ) {
            $phone[] = $key->phone_number;
        }
        return [

            $staff->username,
            $staff->email,
            $phone,
            $staff->created_at->diffForHumans(),
            $staff->updated_at->diffForHumans(),

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
