<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ViewCategoriesLivewire extends Component
{
    public function render()
    {
        return view('livewire.view-categories-livewire', ['Categories' => Category::get()]);
    }

    public function deleteCategory($id) {
        
        $category = Category::findOrFail($id);

        $category->delete();

        session()->flash('deleteMessage','Category is successfully deleted!');
    }
}
