<?php

namespace App\Jobs;

use App\Imports\ChasResourceImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ChasResourcesImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(

        public $file_path

    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::queueImport(new ChasResourceImport, $this->file_path);
    }
}
