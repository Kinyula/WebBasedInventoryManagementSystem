<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class CollegeInventoryManagerImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    private $collegeManager;
    public function __construct()
    {
        $this->collegeManager = User::with(['phone'])->get(['id', 'email'])->pluck('id', 'email');
    }
    /**
    * @param Collection $collection
    */

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            $user = User::create([
                'username' => $row['username'],
                'email' => $row['email'],
                'password' => $row['password']

            ]);


            $user->phone()->create([
                'phone_number' => $row['phone_number'],

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 5000;
    }
}
