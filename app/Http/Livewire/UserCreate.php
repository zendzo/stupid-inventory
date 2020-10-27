<?php

namespace App\Http\Livewire;

use Laravel\Fortify\Rules\Password;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.user-create');
    }

    public function addUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', new Password],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
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
