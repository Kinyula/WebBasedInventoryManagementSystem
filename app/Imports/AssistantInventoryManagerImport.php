<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class AssistantInventoryManagerImport implements
ToCollection,
WithChunkReading,
WithHeadingRow,
ShouldQueue
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
                'password' => Hash::make($row['password'])

            ]);

            $user->phone()->create([
                'phone_number' => $row['phone_number'],

            ]);
        }
    }

    public function chunkSize(): int
    {

        return 100;
    }
}
