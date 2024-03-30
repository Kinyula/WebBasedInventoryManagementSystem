<?php

namespace App\Livewire;

use App\Models\CobeReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;

use Livewire\Component;

class ViewCobeReportLivewire extends Component
{

    use WithPagination;

    public $cobeReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public $reportId = [];

    public function render()
    {
        return view('livewire.view-cobe-report-livewire', ['Reports' => CobeReport::search($this->cobeReportSearch)->with(['user', 'cobeResources', 'category', 'assets'])->paginate(15)]);
    }

    public function exportCobeReportPdf()
    {

        if (empty($this->reportId)) {

            $Reports = [];

            $data = CobeReport::with(['user'])->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("cobe-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CoBE-report.pdf'
                ]
            );
        } else {

            $Reports = [];

            $data = CobeReport::with(['user'])->whereIn('id', $this->reportId)->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("cobe-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CoBE-report.pdf'
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

    public function deleteCobeReport($id)
    {

        $cobeReport = CobeReport::findOrFail($id) ? CobeReport::findOrFail($id)->delete() : false;

        session()->flash('deleteCobeReport', 'Report is deleted successfully!');
    }
}
