<?php

namespace App\Livewire;

use App\Models\CoedReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class ViewCoedReportLivewire extends Component
{
    use WithPagination;

    public $coedReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public $reportId = [];

    public function render()
    {
        return view('livewire.view-coed-report-livewire', ['Reports' => CoedReport::search($this->coedReportSearch)->with(['user', 'coedResources', 'category', 'assets'])->paginate(15)]);
    }

    public function exportCoedReportPdf()
    {

        if (empty($this->reportId)) {
            $Reports = [];

            $data = CoedReport::with(['user'])->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,

                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("coed-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CoED-report.pdf'
                ]
            );
        } else {
            $Reports = [];

            $data = CoedReport::with(['user'])->whereIn('id', $this->reportId)->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,

                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("coed-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CoED-report.pdf'
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

    public function deleteCoedReport($id)
    {

        $coedReport = CoedReport::findOrFail($id);

        $coedReportFile = $coedReport->resource_image;

        if (File::exists(public_path('storage/resource_images/'.$coedReportFile))) {

            File::delete(public_path('storage/resource_images/'.$coedReportFile));

            $coedReport->delete();
        }

        session()->flash('deleteCoedReport', 'Report is deleted successfully!');
    }
}
