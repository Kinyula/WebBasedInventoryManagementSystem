<?php

namespace App\Livewire;

use App\Jobs\ExportChasQrCodesJob;
use App\Jobs\ExportChasResourcesPdfJob;
use App\Models\ChasResource;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class ViewChasCreatedResourcesLivewire extends Component
{


    use WithPagination;

    public $chasResourceSearch = '';

    public $resourceId = [];

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];



    public function render()

    {

        $path = public_path('storage/resource_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }

        return view('livewire.view-chas-created-resources-livewire', ['Resources' => ChasResource::search($this->chasResourceSearch)->with(['user', 'category'])->paginate(15)]);
    }

    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){

        if (File::exists(storage_path('app/public/resource_files/'.$file))) {

            File::delete(storage_path('app/public/resource_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }

    }

    public function exportChasResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChasResource::search($this->chasResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChasResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
                
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported make sure you refresh the page after this action please...');

        }


        else {

            ChasResource::search($this->chasResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data, $dataID) {

                ExportChasResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));

            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported make sure you refresh the page after this action please...');

        }
    }


    public function printChasQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChasResource::search($this->chasResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChasQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported make sure you refresh the page after this action please...');

        }


        else {

            ChasResource::search($this->chasResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportChasQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported make sure you refresh the page after this action please...');

        }
    }




    public function deleteChasCreatedResources($id)
    {

        $chasResource = ChasResource::findOrFail($id) ? ChasResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }



    // public function a(){
    //     dd('here');
    // }

}
