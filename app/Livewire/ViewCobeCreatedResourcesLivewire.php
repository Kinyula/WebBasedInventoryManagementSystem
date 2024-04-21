<?php

namespace App\Livewire;

use App\Jobs\ExportCobeQrCodesJob;
use App\Jobs\ExportCobeResourcesPdfJob;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use App\Models\CoBEResource;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ViewCobeCreatedResourcesLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $cobeResourceSearch = '';

    public $resourceId = [];

    public $pdfFiles = [];

    public function render()
    {

        $path = public_path('storage/resource_cobe_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }

        return view('livewire.view-cobe-created-resources-livewire', ['Resources' => CoBEResource::search($this->cobeResourceSearch)->with(['user'])->paginate(15)]);
    }


    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_cobe_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_cobe_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){

        if (File::exists(storage_path('app/public/resource_cobe_files/'.$file))) {

            File::delete(storage_path('app/public/resource_cobe_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }

    }
    public function exportCobeResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoBEResource::search($this->cobeResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCobeResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported...!');

        }


        else {

            CoBEResource::search($this->cobeResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCobeResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported...!');

        }
    }

    public function printCobeQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoBEResource::search($this->cobeResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCobeQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }

        else {

            CoBEResource::search($this->cobeResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCobeQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

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

    public function deleteCobeCreatedResource($id) {

        $cobeResource = CoBEResource::findOrFail($id) ? CoBEResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');

    }
}
