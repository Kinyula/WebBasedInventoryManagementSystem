<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportChssQrCodesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(

        public $qrcodes
    )
    {
        //
    }

    /**
     * Execute the job.
     */

     private function generateQRCode($data): string
     {
         $renderer = new ImageRenderer(
             new RendererStyle(100),
             new SvgImageBackEnd()
         );

         $writer = new Writer($renderer);

         return 'data:image/svg+xml;base64,' . base64_encode($writer->writeString($data));
     }


    public function handle(): void
    {
        $resources = [];

        foreach ($this->qrcodes as $resource) {

           $qrCode =  $this->generateQRCode($resource->id);
           $resources[] = [
                'qrcode' => $qrCode,
                'resource' => $resource,
           ];

         }

        $fileName = uniqid('UDOM-CHSS-QR-CODES-' . time(), true) . '.pdf';

        $path = public_path('storage/resource_chss_files/' . $fileName);

        $pdf = Pdf::loadView('chss-resources-qrcodes-assets-pdf', ['Resources' =>  $resources]);

        $pdf->save($path);
    }
}
