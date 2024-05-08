<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesLivewire extends Component
{
    public $category;
    public function render()
    {
        return view('livewire.categories-livewire');
    }

    public function addItemCategory(){

        $this->validate([
            'category' => 'required|unique:categories,category_type',

        ]);

        $item_category = new Category();

        $item_category->category_type = $this->category;

        $item_category->save();

        session()->flash('addCategory', 'Category added successfully.');
        $this->reset(['category']);
    }
}
