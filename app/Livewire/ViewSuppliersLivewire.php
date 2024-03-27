<?php

namespace App\Livewire;

use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use App\Models\Supplier;
use Livewire\Component;

class ViewSuppliersLivewire extends Component
{
    public $supplierSearch = '';

    public function render()
    {

        return view('livewire.view-suppliers-livewire',  ['Suppliers' => Supplier::search($this->supplierSearch)->with(['phone', 'services'])->get()]);
    }
    public function exportSuppliersPdf()
    {
        $Suppliers = [];

        $data = Supplier::with(['services', 'phone'])->get();

        foreach ($data as $item) {

            // $QRCode = $this->generateQRCode('UDOM-' . time() . '-' . 'CNMS' . Hash::make($item->id) . '-' . 'report');

            $Suppliers[] = [
                'item' => $item,

                // 'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("UDOM-suppliers-pdf", [
            'Suppliers' => $Suppliers
        ]);


        $pdfOutput = $pdf->output();

        return response()->stream(
            function () use ($pdfOutput) {
                echo $pdfOutput;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=UDOM-suppliers-pdf.pdf'
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

    public function deleteSupplier($id)
    {
        $supplier = Supplier::findOrFail($id) ? Supplier::findOrFail($id)->delete() : false;

        session()->flash('deleteSupplier', 'Supplier is deleted successfully!');
    }
}
