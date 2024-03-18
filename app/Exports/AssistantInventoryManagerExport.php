<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AssistantInventoryManagerExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::with(['phone'])->where('role_id', '1')->get();
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

    public function map($assistant): array
    {

        foreach ( $assistant->phone as $key ) {
            $phone[] = $key->phone_number;
        }
        return [

            $assistant->username,
            $assistant->email,
            $phone,
            $assistant->created_at->diffForHumans(),
            $assistant->updated_at->diffForHumans(),

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
