<?php

namespace App\Livewire;

use App\Jobs\ExportChssQrCodesJob;
use App\Jobs\ExportChssResourcesPdfJob;
use App\Models\ChssResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ViewChssCreatedResourcesLivewire extends Component
{
    use WithPagination;

    public $chssResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public $resourceId = [];

    public $pdfFiles = [];



    public function render()
    {

        $path = public_path('storage/resource_chss_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }



        return view('livewire.view-chss-created-resources-livewire', ['Resources' => ChssResource::search($this->chssResourceSearch)->with(['user', 'category'])->paginate(15)]);
    }


    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_chss_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_chss_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){

        if (File::exists(storage_path('app/public/resource_chss_files/'.$file))) {

            File::delete(storage_path('app/public/resource_chss_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }

    }
    public function exportChssResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChssResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported...!');

        }


        else {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportChssResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported...!');

        }
    }

    public function printChssQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChssQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }


        else {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportChssQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

        }
    }

    public function deleteChssCreatedResource($id)
    {

        $chssResource = ChssResource::findOrFail($id) ? ChssResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');

    }
}
