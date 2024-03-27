<?php

namespace App\Livewire;


use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use App\Models\CoBEResource;
use Livewire\WithPagination;
use Livewire\Component;

class ViewCobeCreatedResourcesLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $cobeResourceSearch = '';

    public function render()
    {
        return view('livewire.view-cobe-created-resources-livewire', ['Resources' => CoBEResource::search($this->cobeResourceSearch)->with(['user'])->paginate(15)]);
    }

    public function exportCobeResourcesPdf()
    {
        $Resources = [];

        $data = CoBEResource::with(['user'])->get();

        foreach ($data as $item) {

            $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CoBE' . Hash::make($item->id) . '-' . 'assets');

            $Resources[] = [
                'item' => $item,
                'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("cobe-resources-assets-pdf", [
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
                'Content-Disposition' => 'inline; filename=UDOM-CoBE-assets.pdf'
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

    public function deleteCobeCreatedResource($id) {

        $cobeResource = CoBEResource::findOrFail($id) ? CoBEResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
        
    }
}
