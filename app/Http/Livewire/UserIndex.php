<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    protected $listeners = [
        'userStored' => 'handleUserStored',
        'userUpdated' => 'handleUserUpdated'
    ];
    public $editUser = false;

    public function render()
    {
        return view('livewire.user-index',[
            'users' => User::latest()->paginate(5),
            'roles' => Role::all()
        ]);
    }


    public function handleUserStored($user)
    {
        session()->flash('message', 'User '.$user['name'].'  Successfully Created');
    }

    public function handleUserUpdated($user)
    {
        session()->flash('message', 'User '.$user['name'].'  Successfully Updated');
        
        $this->editUser = false;
    }

    public function getUser($id)
    {
        $this->editUser = true;
        
        $user = User::findOrfail($id);

        $this->emit('getUser', $user);
    }

    public function destroy($id)
    {
        $user = User::findOrfail($id);

        if ($user) {
            $user->delete();
        }

        session()->flash('message', 'User '.$user['name'].'  Deleted');

        if ($this->editUser) {
            $this->editUser = false;
        }
    }
}
