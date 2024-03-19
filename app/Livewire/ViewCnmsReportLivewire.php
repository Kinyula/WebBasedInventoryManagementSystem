<?php

namespace App\Livewire;

use App\Models\CnmsReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

use Livewire\WithPagination;
use Livewire\Component;

class ViewCnmsReportLivewire extends Component
{

    use WithPagination;

    public $cnmsReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-cnms-report-livewire', ['Reports' => CnmsReport::search($this->cnmsReportSearch)->with(['user', 'cnmsResources','category', 'assets'])->paginate(15)]);
    }

    public function exportCnmsReportPdf()
    {
        $Reports = [];

        $data = CnmsReport::with(['user'])->get();

        foreach ($data as $item) {

            // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

            $Reports[] = [
                'item' => $item,
                // 'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("cnms-resource-status-report-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CNMS-report.pdf'
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

