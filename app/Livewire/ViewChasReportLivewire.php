<?php

namespace App\Livewire;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ChasReport;
use Livewire\Component;
use Livewire\WithPagination;

class ViewChasReportLivewire extends Component
{

    use WithPagination;

    public $chasReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public $reportId = [];

    public function render()
    {
        return view('livewire.view-chas-report-livewire', ['Reports' => ChasReport::search($this->chasReportSearch)->with(['user', 'chasResources', 'category', 'assets'])->paginate(15)]);
    }

    public function exportChasReportPdf()
    {
        if (empty($this->reportId)) {
            $Reports = [];

            $data = ChasReport::with(['user'])->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chas-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHAS-report.pdf'
                ]
            );
        } else {

            $Reports = [];

            $data = ChasReport::with(['user'])->whereIn('id', $this->reportId)->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chas-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHAS-report.pdf'
                ]
            );
        }
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

    public function deleteChasReport($id)
    {

        $chasReport = ChasReport::findOrFail($id) ? ChasReport::findOrFail($id)->delete() : false;
    }
}
