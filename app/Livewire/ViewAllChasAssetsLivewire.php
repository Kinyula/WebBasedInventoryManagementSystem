<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use App\Models\ChasResource;
use App\Jobs\ExportChasQrCodesJob;
use App\Jobs\ExportChasResourcesPdfJob;
use Illuminate\Support\Facades\DB;

class ViewAllChasAssetsLivewire extends Component
{

    public $chasResourceSearch = '';

    public $resourceId = [];

    protected $paginationTheme = 'tailwind';

    protected $listeners = ['export' => '$refresh', 'saved' => '$refresh'];

    public $pdfFiles = [];

    public $allChecked = false;

    public $room, $floor, $building;

    public function markAll()
    {
        if ($this->allChecked) {
            // Mark all checkboxes
            $this->resourceId = ChasResource::search($this->chasResourceSearch)
                ->where('repair_status', '=', 'Repair')
                ->pluck('id')
                ->toArray();
        } else {
            // Unmark all checkboxes
            $this->resourceId = [];
        }
    }

    public function verifySelected()
    {
        if (empty($this->resourceId)) {
            session()->flash('error', 'No items selected for the approval after verification.');
            return;
        }

        DB::transaction(function () {
            ChasResource::whereIn('id', $this->resourceId)
                ->update([
                    'repair_status' => 'Repaired',
                ]);
        });

        session()->flash('done', 'Approved successfully.');
        // Reset selection and checkbox state
        $this->resourceId = [];
        $this->allChecked = false;


    }

    public function allMark(){
        if ($this->allChecked) {
            // Mark all checkboxes
            $this->resourceId = ChasResource::search($this->chasResourceSearch)
                ->where('allocation_status', '=', 'Transfered')
                ->pluck('id')
                ->toArray();
        } else {
            // Unmark all checkboxes
            $this->resourceId = [];
        }
    }

    public function allocateSelected(){

        if (empty($this->resourceId)) {
            session()->flash('error', 'No items selected for the approval after verification.');
            return;
        }

        DB::transaction(function () {
            ChasResource::whereIn('id', $this->resourceId)
                ->update([
                    'allocation_status' => 'Allocated',
                    'building' => $this->building,
                    'specific_area' => $this->floor,
                    'room' => $this->room
                ]);
        });

        session()->flash('done', 'Allocated successfully.');
        // Reset selection and checkbox state
        $this->resourceId = [];
        $this->allChecked = false;
    }
    public function render()
    {

        $path = public_path('storage/resource_files/');

        $files = File::files($path);

        foreach ($files as $file) {
            $this->pdfFiles[] = $file->getPathname();
        }

        if (auth()->user()->department == 'DICT') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('repair_status', '=', 'Repair')->whereIn('category_id',['5', '15'])->paginate(15),

                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->whereIn('category_id',['5', '15'])->paginate(15),

            ]);
        } elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 1') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('department', '=', 'department 1')->paginate(15),


                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'department 1')->paginate(15),


            ]);
        }

        elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'ESTATE') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->whereIn('category_id', ['3', '4', '6','7','13'])->where('allocation_status', '=', 'Allocated')->paginate(15),


                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->whereIn('category_id', ['3', '4', '6','7','13'])->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'ESTATE')->paginate(15),


            ]);
        }

        elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 2') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('department', '=', 'department 2')->paginate(15),

                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'department 1')->paginate(15),


            ]);
        } elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 3') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('department', '=', 'department 3')->paginate(15),

                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'department 1')->paginate(15),


            ]);
        }elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 4') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('department', '=', 'department 4')->paginate(15),

                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'department 1')->paginate(15),

            ]);
        }elseif (auth()->user()->post == 'Head of department ( HOD )' && auth()->user()->department == 'department 5') {
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('department', '=', 'department 5')->paginate(15),

                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->where('department', '=', 'department 1')->paginate(15),

            ]);


        }else{
            return view('livewire.view-all-chas-assets-livewire', [
                'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->paginate(15),



                'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                    ['user', 'category', 'allocation']
                )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->paginate(15),


            ]);
        }

        return view('livewire.view-all-chas-assets-livewire', [
            'Resources' => ChasResource::search($this->chasResourceSearch)->with(
                ['user', 'category', 'allocation']
            )->paginate(15),

            'NotAllocatedResources' => ChasResource::search($this->chasResourceSearch)->with(
                ['user', 'category', 'allocation']
            )->where('building', '=', 'Not yet set')->where('specific_area', '=', 'Not yet set')->where('room', '=', 'Not yet set')->paginate(15),
        ]);
    }

    public function deleteFiles($pdf)
    {


        if (File::exists(storage_path('app/public/resource_files/' . $pdf))) {

            File::delete(storage_path('app/public/resource_files/' . $pdf));

            session()->flash('downloadSuccessMessage', 'The file is downloaded!');
        } else {

            session()->flash('downloadErrorMessage', 'ERROR 404 File not found please remember to refresh the page to view the remaining files!');
        }
    }

    public function deleteFilesManually($file)
    {

        if (File::exists(storage_path('app/public/resource_files/' . $file))) {

            File::delete(storage_path('app/public/resource_files/' . $file));

            session()->flash('deleteErrorMessage', 'The file is deleted!');
        } else {
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
        } else {

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
        } else {

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
}
