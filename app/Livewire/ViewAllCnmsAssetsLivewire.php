<?php

namespace App\Livewire;

use App\Jobs\ExportCnmsQrCodesJob;
use App\Jobs\ExportCnmsResourcesPdfJob;
use App\Models\CnmsResource;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class ViewAllCnmsAssetsLivewire extends Component
{

    public $cnmsResourceSearch = '';

    public $resourceId = [];

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];

    public function render()
    {

        $path = public_path('storage/resource_cnms_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }

        return view('livewire.view-all-cnms-assets-livewire', [
            'Resources' => CnmsResource::search($this->cnmsResourceSearch)->with(
                ['user', 'category']
            )->paginate(15),


        ]);
    }

    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_cnms_files/' . $pdf))) {

            File::delete(storage_path('app/public/resource_cnms_files/' . $pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        } else {

            session()->flash('downloadErrorMessage', 'ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function deleteFilesManually($file)
    {

        if (File::exists(storage_path('app/public/resource_cnms_files/' . $file))) {

            File::delete(storage_path('app/public/resource_cnms_files/' . $file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        } else {
            session()->flash('deleteErrorMessage', ' ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function exportCnmsResourcesPdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCnmsResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported make sure you refresh the page after this action please...');
        } else {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data, $dataID) {

                ExportCnmsResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported make sure you refresh the page after this action please...');
        }
    }


    public function printCnmsQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCnmsQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        } else {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCnmsQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported make sure you refresh the page after this action please...');
        }
    }




    public function deleteCnmsCreatedResources($id)
    {

        $chasResource = CnmsResource::findOrFail($id) ? CnmsResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted successfully!');
    }
}
