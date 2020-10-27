<?php

namespace App\Http\Livewire;

use App\Models\User;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $password;
    public $userId;

    protected $listeners = [
        'getUser' => 'showUser'
    ];
    public function render()
    {
        return view('livewire.user-edit');
    }

    public function showUser($user)
    {
        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->userId = $user['id'];
    }

    public function updateUser()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->userId],
            'password' => ['required', 'string', new Password],
        ]);

        if ($this->id) {
            $user = User::findOrfail($this->userId);
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
        }

        $this->emit('userUpdated', $user);
    }
}
