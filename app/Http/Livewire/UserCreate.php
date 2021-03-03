<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $role_id;

    public function render()
    {
        return view('livewire.user-create',[
            'roles' => Role::where('id','>',1)->get()
        ]);
    }

    public function addUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password],
            'role_id' => ['required'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id
        ]);

        $this->resetInput();

        $this->emit('userStored', $user);
    }

    public function resetInput()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
    }
}
