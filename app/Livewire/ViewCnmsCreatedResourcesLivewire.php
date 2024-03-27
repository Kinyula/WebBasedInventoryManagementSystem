<?php

namespace App\Livewire;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use App\Models\CnmsResource;
use Livewire\Component;
use Livewire\WithPagination;


class ViewCnmsCreatedResourcesLivewire extends Component
{

    use WithPagination;

    public $cnmsResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-cnms-created-resources-livewire', ['Resources' => CnmsResource::search($this->cnmsResourceSearch)->with(['user','category','assets'])->paginate(15)]);
    }

    public function exportCnmsResourcesPdf()
    {
        $Resources = [];

        $data = CnmsResource::with(['user'])->get();

        foreach ($data as $item) {

            $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'assets');

            $Resources[] = [
                'item' => $item,
                'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("cnms-resources-assets-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CNMS-assets.pdf'
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

    public function deleteCnmsCreatedResource($id) {

        $cnmsResource = CnmsResource::findOrFail($id) ? CnmsResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted succesfully!');
        
    }
}
