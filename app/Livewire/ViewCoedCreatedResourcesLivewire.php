<?php

namespace App\Livewire;

use App\Jobs\ExportCoedQrCodesJob;
use App\Jobs\ExportCoedResourcesPdfJob;
use App\Models\CoEDResource;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

use Livewire\Component;

class ViewCoedCreatedResourcesLivewire extends Component
{

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $coedResourceSearch = '';

    public $pdfFiles = [];

    public $resourceId = [];

    public function render()
    {

        $path = public_path('storage/resource_coed_files/');

        $files = File::files($path);

        foreach ($files as $file) {

            $this->pdfFiles[] = $file->getPathname();

        }

        return view('livewire.view-coed-created-resources-livewire', ['Resources' => CoEDResource::search($this->coedResourceSearch)->with(['user'])->paginate(15)]);
    }

    public function deleteFiles($pdf)
    {

        if (File::exists(storage_path('app/public/resource_coed_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_coed_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){



        if (File::exists(storage_path('app/public/resource_coed_files/'.$file))) {

            File::delete(storage_path('app/public/resource_coed_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }

    }

    public function exportCoedResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoEDResource::search($this->coedResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCoedResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported...!');

        }


        else {

            CoEDResource::search($this->coedResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCoedResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });


            session()->flash('exportResource', 'Selected resource PDF is ready to be exported...!');

        }
    }

    public function printCoedQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CoEDResource::search($this->coedResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCoedQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }

        else {

            CoEDResource::search($this->coedResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCoedQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

        }
    }

    public function deleteCoedCreatedResource($id)
    {

        $coedResource = CoEDResource::findOrFail($id) ? CoEDResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
