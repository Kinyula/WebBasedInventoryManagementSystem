<?php

namespace App\Livewire;

use App\Models\ResourceAllocation;
use Livewire\Component;
use Livewire\WithPagination;

class ViewAllocatedResourcesLivewire extends Component
{
    public $resourceSearch = '';

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        return view('livewire.view-allocated-resources-livewire', ['Resources' => ResourceAllocation::search($this->resourceSearch)->with(['assets', 'user'])->paginate(15)]);
    }

    public function deleteResources($id)
    {
        $delete_resource = ResourceAllocation::where("id", $id)->exists() ? ResourceAllocation::findOrFail($id)->delete() : false;
        session()->flash('deleteResource', 'Resource is deleted successfully.');
    }
}
