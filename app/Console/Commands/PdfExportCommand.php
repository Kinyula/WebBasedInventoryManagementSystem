<?php

namespace App\Console\Commands;

use App\Events\ExportPdf;
use App\Jobs\TestJob;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;

class PdfExportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to export pdf';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text(
            label: "What is your name?",
            required: true
        );

        $gender = text(
            label: "What is your gender?",
            required: true
        );

       TestJob::dispatch($name, $gender);
    }
}
