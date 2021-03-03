<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleIndex extends Component
{
    protected $listeners = [
        'roleStored' => 'handleRoleStored',
        'roleUpdated' => 'handleRoleUpdated'
    ];
    public $editRole = false;

    public function render()
    {
        return view('livewire.role-index',[
            'categories' => Role::orderBy('id')->paginate(5)
        ]);
    }


    public function handleRoleStored($role)
    {
        session()->flash('message', 'Role '.$role['name'].'  Successfully Created');
    }

    public function handleRoleUpdated($role)
    {
        session()->flash('message', 'Role '.$role['name'].'  Successfully Updated');

        $this->editRole = false;
    }

    public function getRole($id)
    {
        $this->editRole = true;
        
        $role = Role::findOrfail($id);

        $this->emit('getRole', $role);
    }

    public function destroy($id)
    {
        $role = Role::findOrfail($id);

        if ($role) {
            $role->delete();
        }

        session()->flash('message', 'Role '.$role['name'].'  Deleted');

        if ($this->editRole) {
            $this->editRole = false;
        }
    }
}
