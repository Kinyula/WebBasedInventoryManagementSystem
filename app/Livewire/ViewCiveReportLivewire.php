<?php

namespace App\Livewire;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;


class ViewCiveReportLivewire extends Component
{

    use WithPagination;

    public $civeReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-cive-report-livewire', ['Reports' => Report::search($this->civeReportSearch)->with(['user', 'chasResources','category', 'assets'])->paginate(15)]);
    }

    public function exportChasReportPdf()
    {
        $Reports = [];

        $data = Report::with(['user'])->get();

        foreach ($data as $item) {

            // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

            $Reports[] = [
                'item' => $item,
                // 'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("cive-resource-status-report-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CIVE-report.pdf'
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

    public function deleteCiveReport($id) {

        $chasReport = Report::findOrFail($id) ? Report::findOrFail($id)->delete() : false;

    }
}
