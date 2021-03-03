<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;

class RoleCreate extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.role-create');
    }

    public function addRole()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);
        
        $role = Role::create([
            'name' => $this->name,
        ]);

        $this->resetInput();

        $this->emit('roleStored',$role);
    }

    public function resetInput()
    {
        $this->name = null;
    }
}
