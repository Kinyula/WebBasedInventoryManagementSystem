<?php

namespace App\Livewire;

use App\Jobs\ExportCnmsQrCodesJob;
use App\Jobs\ExportCnmsResourcesPdfJob;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use App\Models\CnmsResource;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\File;

class ViewCnmsCreatedResourcesLivewire extends Component
{

    use WithPagination;

    public $cnmsResourceSearch = '';

    protected $paginationTheme = 'tailwind';

    public $pdfFiles = [];

    public $resourceId = [];

    public function render()
    {

        $path = public_path('storage/resource_cnms_files/');


        $files = File::files($path);

        if (!empty($files)) {

            dd($files);
            foreach ($files as $file) {

                $this->pdfFiles[] = $file->getPathname();
            }
        } else {
            # code...
        }




        return view('livewire.view-cnms-created-resources-livewire', ['Resources' => CnmsResource::search($this->cnmsResourceSearch)->with(['user','category','assets'])->paginate(15)]);
    }


    public function deleteFiles($pdf)
    {

        if (File::exists(storage_path('app/public/resource_cnms_files/'.$pdf))) {

            File::delete(storage_path('app/public/resource_cnms_files/'.$pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        }

        else {

            session()->flash('downloadErrorMessage', 'ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }


    }

    public function deleteFilesManually($file){

        dd($file);

        if (File::exists(storage_path('app/public/resource_cnms_files/'.$file))) {

            File::delete(storage_path('app/public/resource_cnms_files/'.$file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        }

        else {
            session()->flash('deleteErrorMessage', ' ERROR | 404 File not found please remember to refresh the page to view the remaining files!');
        }

    }


    public function exportCnmsResourcesPdf()
    {

        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCnmsResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource PDF is ready to be exported...!');

        }


        else {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data) {

                ExportCnmsResourcesPdfJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource PDF is ready to be exported...!');

        }
    }


    public function printCnmsQrCodePdf()
    {
        $chunkSize = 200;

        if (empty($this->resourceId)) {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->chunk($chunkSize, function ($data) {

                ExportCnmsQrCodesJob::dispatch($data)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Resource QR Codes are ready to be exported...!');

        }


        else {

            CnmsResource::search($this->cnmsResourceSearch)->with(['user'])->whereIn('id', $this->resourceId)->chunk($chunkSize, function ($data, $dataID) {

                ExportCnmsQrCodesJob::dispatch($data,$dataID)->delay(now()->addSeconds(2));
            });

            session()->flash('exportResource', 'Selected resource QR Codes are ready to be exported...!');

        }
    }
    public function deleteCnmsCreatedResource($id) {

        $cnmsResource = CnmsResource::findOrFail($id) ? CnmsResource::findOrFail($id)->delete() : false;

        session()->flash('deleteResource', 'Resource is deleted succesfully!');

    }
}
