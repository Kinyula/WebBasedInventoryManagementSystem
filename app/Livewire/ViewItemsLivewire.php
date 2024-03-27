<?php

namespace App\Livewire;

use App\Exports\AssetExport;
use App\Models\Asset;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use function Spatie\LaravelPdf\Support\pdf;

class ViewItemsLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $assetSearch = '';

    public function render()
    {

        return view('livewire.view-items-livewire', [
            'Assets' => Asset::search($this->assetSearch)->with(['category', 'assetStatus'])->paginate(15),
        ]);
    }

    public function exportAssetsPdf()
    {
        $Assets = [];
        foreach (Asset::with(['category', 'assetStatus'])->get() as $item) {
            $QRCode = $this->generateQRCode('UDOM-'.time().'-'.Hash::make($item->id).'-'.'assets');
            $Assets[] = [
                'item' => $item,
                'qrcode' => $QRCode
            ];
        }

        $pdf = Pdf::loadView("pdf", [
            'Assets' => $Assets
        ]);


        $pdfOutput = $pdf->output();

        return response()->stream(
            function () use ($pdfOutput) {
                echo $pdfOutput;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename=UDOM-assets.pdf'
            ]
        );
    }

    public function deleteItems($id)
    {
        $delete_item = Asset::where("id", $id)->exists() ? Asset::findOrFail($id)->delete() : false;
        
        session()->flash('deleteAsset', 'Asset is deleted successfully.');
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
