<?php

namespace App\Livewire;

use App\Models\CiveResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCiveCreatedResourceLivewire extends Component
{
    use WithPagination;

    public $civeResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-cive-created-resource-livewire', ['Resources' => CiveResource::search($this->civeResourceSearch)->with(['user'])->paginate(15)]);
    }

    public function exportCiveResourcesPdf()
    {
        $Resources = [];

        $data = CiveResource::with(['user'])->get();

        foreach ($data as $item) {

            $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CIVE' . Hash::make($item->id) . '-' . 'assets');
            $Resources[] = [
                'item' => $item,
                'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("cive-resources-assets-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CIVE-assets.pdf'
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
