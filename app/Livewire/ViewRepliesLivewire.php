<?php

namespace App\Livewire;

use App\Models\MessagingReport;
use Livewire\Component;
use App\Models\Replies;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;

class ViewRepliesLivewire extends Component
{
    public $reportId = [];

    public function render()
    {
        if (auth()->user()->college_name == 'College of Health and Allied Science ( CHAS )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Health and Allied Science ( CHAS )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Natural Mathematical Science ( CNMS ) ') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Natural Mathematical Science ( CNMS ) ')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Education ( CoED )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Education ( CoED )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Business and Economics ( CoBE )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Business and Economics ( CoBE )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Humanities and Social Science ( CHSS )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Humanities and Social Science ( CHSS )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Earth Sciences and Engineering ( CoESE )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Earth Sciences and Engineering ( CoESE )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'College of Informatics and Virtual Education ( CIVE )') {

            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->where('college_name', 'College of Informatics and Virtual Education ( CIVE )')->paginate(15)]);
        }

        if (auth()->user()->college_name == 'Not set') {
            return view('livewire.view-replies-livewire', ['Reports' => MessagingReport::with(['user'])->paginate(15)]);
        }
    }

    public function exportSendingReportPdf()
    {
        if (!empty($this->reportId)) {
            $Reports = [];

            $data = MessagingReport::with(['user'])->whereIn('id', $this->reportId)->get();

            foreach ($data as $item) {

                // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

                $Reports[] = [
                    'item' => $item,
                    // 'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("Assistant-Inventory-Manager-Reply-Report-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-Assistant-Inventory-Manager-reply-report.pdf'
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
    public function download($id)
    {

        $file_path = Replies::where('id', $id)->first();

        return response()->download(public_path('storage/report_files/' . $file_path->report_file));
    }

    public function deleteReplies($id){

        $message = MessagingReport::findOrFail($id) ? MessagingReport::findOrFail($id)->delete() : false;

        session()->flash('deleteReplies', 'Reply is successfully deleted!');
    }
}
