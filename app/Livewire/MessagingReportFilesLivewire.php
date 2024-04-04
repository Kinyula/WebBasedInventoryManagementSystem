<?php

namespace App\Livewire;

use App\Models\MessagingReport;
use App\Models\SendingReport;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;

use Livewire\Component;

class MessagingReportFilesLivewire extends Component
{
    use WithPagination;

    public $reply_text, $college_name;

    public function render()
    {
        return view('livewire.messaging-report-files-livewire');
    }

    public function replyText(){

        $this->validate(['reply_text' => 'required', 'college_name' => 'required']);

        $replyText = new MessagingReport();

        $replyText->user_id = auth()->user()->id;

        $replyText->message = $this->reply_text;

        $replyText->college_name = $this->college_name;

        $replyText->save();

        $this->reset(['reply_text', 'college_name']);

        session()->flash('message', 'Reply saved!');
    }


    public function exportSendingReportPdf()
    {
        if (empty($this->reportId)) {

            $Reports = [];

            $data = MessagingReport::with(['user'])->get();

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
        } else {
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
}
