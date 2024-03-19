<?php

namespace App\Livewire;

use App\Models\ChssResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Component;

class ViewChssCreatedResourcesLivewire extends Component
{
    use WithPagination;

    public $chssResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-chss-created-resources-livewire' , ['Resources' => ChssResource::search($this->chssResourceSearch)->with(['user','category'])->paginate(15)]);
    }

    public function exportChssResourcesPdf()
    {
        $Resources = [];

        $data = ChssResource::with(['user'])->get();

        foreach ($data as $item) {

            $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'assets');

            $Resources[] = [
                'item' => $item,
                'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("chss-resources-assets-pdf", [
            'Resources' => $Resources
        ]);


        $pdfOutput = $pdf->output();

        return response()->stream(
            function () use ($pdfOutput) {
                echo $pdfOutput;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=UDOM-CHSS-assets.pdf'
            ]
        );
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
}
