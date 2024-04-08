<?php

namespace App\Livewire;

use App\Models\ChasResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;

class ViewChasCreatedResourcesLivewire extends Component
{

    use WithPagination;

    public $chasResourceSearch = '';

    public $resourceId = [];

    public $all = false;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-chas-created-resources-livewire', ['Resources' => ChasResource::search($this->chasResourceSearch)->with(['user', 'category'])->paginate(15)]);
    }

    public function exportChasResourcesPdf()
    {
        if (empty($this->resourceId)) {

            if (empty($this->chasResourceSearch)) {

                $Resources = [];

                $data = ChasResource::with(['user'])->get();

                foreach ($data as $item) {

                    $QRCode = $this->generateQRCode($item->id);

                    $Resources[] = [
                        'item' => $item,
                        'qrcode' => $QRCode
                    ];
                }

                $pdf = Pdf::loadView("chas-resources-assets-pdf", [
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
                        'Content-Disposition' => 'inline; filename=UDOM-CHAS-assets.pdf'
                    ]
                );
            }


            else {

                $Resources = [];

                $data = ChasResource::with(['user'])->where('asset_status', $this->chasResourceSearch)->get();

                foreach ($data as $item) {

                    $QRCode = $this->generateQRCode($item->id);

                    $Resources[] = [
                        'item' => $item,
                        'qrcode' => $QRCode
                    ];
                }

                $pdf = Pdf::loadView("chas-resources-assets-pdf", [
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
                        'Content-Disposition' => 'inline; filename=UDOM-CHAS-assets.pdf'
                    ]
                );
            }
        } else {

            $Resources = [];

            $data = ChasResource::with(['user'])->whereIn('id', $this->resourceId)->get();

            foreach ($data as $item) {

                $QRCode = $this->generateQRCode($item->id);

                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chas-resources-assets-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHAS-assets.pdf'
                ]
            );
        }
    }

    public function printChasQrCodePdf()
    {

        if (empty($this->resourceId)) {
            $Resources = [];

            $data = ChasResource::with(['user'])->get();

            foreach ($data as $item) {

                $QRCode = $this->generateQRCode($item->id);

                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chas-resources-qrcodes-assets-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHAS-assets.pdf'
                ]
            );
        } else {

            $Resources = [];

            $data = ChasResource::with(['user'])->whereIn('id', $this->resourceId)->get();

            foreach ($data as $item) {

                $QRCode = $this->generateQRCode($item->id);

                $Resources[] = [
                    'item' => $item,
                    'qrcode' => $QRCode
                ];
            }

            $pdf = Pdf::loadView("chas-resources-qrcodes-assets-pdf", [
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
                    'Content-Disposition' => 'inline; filename=UDOM-CHAS-assets.pdf'
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

    public function deleteChasCreatedResources($id)
    {

        $chasResource = ChasResource::findOrFail($id) ? ChasResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
