<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $name;
    public $description;
    public $categoryId;

    protected $listeners = [
        'getCategory' => 'showCategory'
    ];
    public function render()
    {
        return view('livewire.category-edit');
    }

    public function showCategory($category)
    {
        $this->name = $category['name'];
        $this->description = $category['description'];
        $this->categoryId = $category['id'];
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3'
        ]);

        if ($this->id) {
            $category = Category::findOrfail($this->categoryId);
            $category->update([
                'name' => $this->name,
                'description' => $this->description
            ]);
        }

        $this->emit('categoryUpdated', $category);
    }
}
