<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoryCreate extends Component
{
    public $name;
    public $description;

    public function render()
    {
        return view('livewire.category-create');
    }

    public function addCategory()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:5'
        ]);
        
        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description
        ]);

        $this->resetInput();

        $this->emit('categoryStored',$category);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
    }
}
