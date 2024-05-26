<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Imports\AssistantInventoryManagerImport;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;


class AssistantImportProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(

        public $file_path
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

            Excel::queueImport(new AssistantInventoryManagerImport, $this->file_path);

    }
}
