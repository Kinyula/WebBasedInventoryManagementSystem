<?php

namespace App\Livewire;

use App\Models\CoeseReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class ViewCoeseReportLivewire extends Component
{

    use WithPagination;

    public $coeseReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-coese-report-livewire', ['Reports' => CoeseReport::search($this->coeseReportSearch)->with(['user', 'coeseResources', 'category', 'assets'])->paginate(15)]);
    }

    public function exportCoeseReportPdf()
    {
        $Reports = [];

        $data = CoeseReport::with(['user'])->get();

        foreach ($data as $item) {

            // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

            $Reports[] = [
                'item' => $item,

                // 'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("coese-resource-status-report-pdf", [
            'Reports' => $Reports
        ]);


        $pdfOutput = $pdf->output();

        return response()->stream(
            function () use ($pdfOutput) {
                echo $pdfOutput;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=UDOM-CoESE-report.pdf'
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
