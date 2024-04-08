<?php

namespace App\Livewire;

use App\Models\ChssReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ViewChssReportLivewire extends Component
{

    use WithPagination;

    public $chssReportSearch = '';

    protected $paginationTheme = 'tailwind';

    public $reportId = [];

    public function render()
    {
        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {
            return view('livewire.view-chss-report-livewire', ['Reports' => ChssReport::search($this->chssReportSearch)->with(['user', 'chssResources', 'category', 'assets'])->where('college_name', auth()->user()->college_name)->paginate(15)]);
        }

    }

    public function exportCnmsReportPdf()
    {
        if (empty($this->reportId)) {

            $Reports = [];

            $data = ChssReport::with(['user'])->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chss-resource-status-report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHSS-report.pdf'
                ]
            );
        } else {
        $Reports = [];

        $data = ChssReport::with(['user'])->whereIn('id', $this->reportId)->get();

        foreach ($data as $item) {

            // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

            $Reports[] = [
                'item' => $item,
                // 'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("chss-resource-status-report-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CHSS-report.pdf'
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

    public function deleteChssReport($id)
    {

        $chssReport = ChssReport::findOrFail($id);

        $chasReportFile = $chssReport->resource_image;

        if (File::exists(public_path('storage/resource_images/'.$chasReportFile))) {

            File::delete(public_path('storage/resource_images/'.$chasReportFile));

            $chssReport->delete();
        }

        session()->flash('deleteChssReport', 'Report is deleted successfully!');
    }
}
