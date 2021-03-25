<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryIndex extends Component
{
    protected $listeners = [
        'categoryStored' => 'handleCategoryStored',
        'categoryUpdated' => 'handleCategoryUpdated'
    ];
    public $editCategory = false;

    public function render()
    {
        return view('livewire.category-index',[
            'categories' => Category::orderBy('id', 'DESC')->paginate(5)
        ]);
    }


    public function handleCategoryStored($category)
    {
        session()->flash('message', 'Category '.$category['name'].'  Successfully Created');
    }

    public function handleCategoryUpdated($category)
    {
        session()->flash('message', 'Category '.$category['name'].'  Successfully Updated');

        $this->editCategory = false;
    }

    public function getCategory($id)
    {
        $this->editCategory = true;
        
        $category = Category::findOrfail($id);

        $this->emit('getCategory', $category);
    }

    public function destroy($id)
    {
        $category = Category::findOrfail($id);

        if ($category) {
            $category->delete();
        }

        session()->flash('message', 'Category '.$category['name'].'  Deleted');

        if ($this->editCategory) {
            $this->editCategory = false;
        }
    }
}
