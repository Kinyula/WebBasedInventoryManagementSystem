<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AssistantInventoryManagerImport;

class AssistantImportProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        
        public $assistantInventoryManager
    )
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new AssistantInventoryManagerImport, $this->assistantInventoryManager);
    }
}
