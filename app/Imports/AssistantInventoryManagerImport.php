<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssistantInventoryManagerImport implements ToCollection, WithChunkReading, WithHeadingRow
{

    /**
     * @param Collection $collection
     */
    private $assistant;
    
    public function __construct()
    {
        $this->assistant = User::with(['phone'])->get(['id', 'email'])->pluck('id', 'email');
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
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
