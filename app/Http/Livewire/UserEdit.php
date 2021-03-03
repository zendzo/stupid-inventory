<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Laravel\Fortify\Rules\Password;
use Livewire\Component;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $password;
    public $userId;
    public $role_id;

    protected $listeners = [
        'getUser' => 'showUser'
    ];
    public function render()
    {
        return view('livewire.user-edit',[
            'roles' => Role::where('id', '>' , 1)->get()
        ]);
    }

    public function showUser($user)
    {
        if ($user['role_id'] === 1) {
            $this->email = null;
            $this->name = null;
            $this->userId = null;
            $this->role_id = null;
            $this->password = null;
            return '';
        }

        $this->name = $user['name'];
        $this->email = $user['email'];
        $this->userId = $user['id'];
        $this->role_id = $user['role_id'];
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
                'password' => $this->password,
                'role_id' => $this->role_id
            ]);
        }

        $this->emit('userUpdated', $user);
    }
}
