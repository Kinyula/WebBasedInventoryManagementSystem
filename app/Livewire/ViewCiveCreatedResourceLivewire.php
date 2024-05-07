<?php

namespace App\Livewire;

use App\Jobs\ExportCiveQrCodesJob;
use App\Jobs\ExportCiveResourcesPdfJob;
use App\Models\CiveResource;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class ViewCiveCreatedResourceLivewire extends Component
{
    use WithPagination;

    public $civeResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];

    public $resourceId = [];


    public function render()
    {

        $path = public_path('storage/resource_cive_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }


        return view('livewire.view-cive-created-resource-livewire', ['Resources' => CiveResource::search($this->civeResourceSearch)->with(['user'])->paginate(15)]);
    }


    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_cive_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_cive_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){

        if (File::exists(storage_path('app/public/resource_cive_files/'.$file))) {

            File::delete(storage_path('app/public/resource_cive_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR 404 | File not found please remember to refresh the page to view the remaining files!');
        }

    }


    public function exportCiveResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CiveResource::search($this->civeResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCiveResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported make sure you refresh the page after this action please...');
        } else {

            CiveResource::search($this->civeResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCiveResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported make sure you refresh the page after this action please...');
        }
    }


    public function printCiveQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CiveResource::search($this->civeResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCiveQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        } else {

            CiveResource::search($this->civeResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCiveQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        }
    }

    public function deleteCiveCreatedResource($id)
    {

        $civeResource = CiveResource::findOrFail($id) ? CiveResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
