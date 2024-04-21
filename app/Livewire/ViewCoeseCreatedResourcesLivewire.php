<?php

namespace App\Livewire;

use App\Jobs\ExportCoeseQrCodesJob;
use App\Jobs\ExportCoeseResourcesJob;
use App\Models\CoESEResource;
use Livewire\Component;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class ViewCoeseCreatedResourcesLivewire extends Component
{

    use WithPagination;

    public $coeseResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public $resourceId = [];

    public $pdfFiles = [];

    public function render()
    {

        $path = public_path('storage/resource_coese_files/');

        $files = File::files($path);

        foreach ($files as $file) {

            $this->pdfFiles[] = $file->getPathname();

        }

        return view('livewire.view-coese-created-resources-livewire', ['Resources' => CoESEResource::search($this->coeseResourceSearch)->with(['user'])->paginate(15)]);
    }

    public function deleteFiles($pdf)
    {

        if (File::exists(storage_path('app/public/resource_coese_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_coese_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){



        if (File::exists(storage_path('app/public/resource_coese_files/'.$file))) {

            File::delete(storage_path('app/public/resource_coese_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }

    }


    public function exportCoeseResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoESEResource::search($this->coeseResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCoeseResourcesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }

        else {

            CoESEResource::search($this->coeseResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCoeseResourcesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

        }
    }

    public function printCoeseQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoESEResource::search($this->coeseResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCoeseQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }

        else {

            CoESEResource::search($this->coeseResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCoeseQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

        }
    }


    public function deleteCoeseCreatedResource($id) {

        $coeseResource = CoESEResource::findOrFail($id) ? CoESEResource::findOrFail($id)->delete() : false;

    }
}
