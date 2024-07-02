<?php

namespace App\Livewire;

use App\Jobs\ExportChssQrCodesJob;
use App\Jobs\ExportChssResourcesPdfJob;
use App\Models\ChssResource;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ViewAllChssAssetsLivewire extends Component
{
    public $chssResourceSearch = '';

    public $resourceId = [];

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];

    public function render()
    {

        $path = public_path('storage/resource_chss_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }


        return view('livewire.view-all-chss-assets-livewire', [
            'Resources' => ChssResource::search($this->chssResourceSearch)->with(
                ['user', 'category']
            )->paginate(15),


        ]);
    }

    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_chss_files/' . $pdf))) {

            File::delete(storage_path('app/public/resource_chss_files/' . $pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        } else {

            session()->flash('downloadErrorMessage', 'ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function deleteFilesManually($file)
    {

        if (File::exists(storage_path('app/public/resource_chss_files/' . $file))) {

            File::delete(storage_path('app/public/resource_chss_files/' . $file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        } else {
            session()->flash('deleteErrorMessage', ' ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function exportChssResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChssResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported make sure you refresh the page after this action please...');
        } else {

            ChssResource::search($this->chssResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data, $dataID) {

                ExportChssResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported make sure you refresh the page after this action please...');
        }
    }


    public function printChssQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            ChssResource::search($this->chasResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportChssQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        } else {

            ChssResource::search($this->chasResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportChssQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        }
    }




    public function deleteChssCreatedResources($id)
    {

        $chasResource = ChssResource::findOrFail($id) ? ChssResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
