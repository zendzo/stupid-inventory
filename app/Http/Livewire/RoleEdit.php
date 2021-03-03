<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleEdit extends Component
{
    public $name;
    public $roleId;

    protected $listeners = [
        'getRole' => 'showRole'
    ];
    public function render()
    {
        return view('livewire.role-edit');
    }

    public function showRole($role)
    {
        $this->name = $role['name'];
        $this->roleId = $role['id'];
    }

    public function updateRole()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        if ($this->id) {
            $role = Role::findOrfail($this->roleId);
            $role->update([
                'name' => $this->name,
            ]);
        }

        $this->emit('roleUpdated', $role);
    }
}
