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

class ExportCoeseResourcesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(

        public $resources
    )
    {
        //
    }

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

        foreach ($this->resources as $resource) {

            $qrcode = $this->generateQRCode($resource->id);

            $resources[] = [
                'qrcode' => $qrcode,
                'resource' => $resource
            ];
        }

        $fileName = uniqid('UDOM-COESE-RESOURCES'.time(), true).'.pdf';

        $path = public_path('storage/resource_coese_files/'.$fileName);

        $pdf = Pdf::loadView('coese-resources-assets-pdf', ['Resources' => $resources]);

        $pdf->save($path);
    }
}
