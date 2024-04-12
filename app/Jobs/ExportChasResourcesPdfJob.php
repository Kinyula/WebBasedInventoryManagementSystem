<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\ChasResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Time;

class ExportChasResourcesPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct(

        public $resources

    ) {
    }


    /**
     * Execute the job.
     */

    public function handle()
    {

    
        $fileName = uniqid('UDOM-RESOURCES-' . time(), true) . '.pdf';

        $path = public_path('storage/resource_files/' . $fileName);

        $pdf = Pdf::loadView('chas-resources-assets-pdf', ['Resources' => $this->resources]);

        $pdf->save($path);


    }
}
