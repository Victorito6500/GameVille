<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminUserEdit extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $address;
    public $phone;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric|digits:9',
            'password' => 'nullable|string|min:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nombre es obligatorio',
            'email.required' => 'Un email es obligatorio',
            'name.max' => 'El nombre es demasiado largo',
            'address.max' => 'El nombre es demasiado largo',
            'email.email' => 'El email debe tener un formato correcto',
            'phone.numeric' => 'El teléfono debe ser un número',
            'phone.digits' => 'El teléfono debe tener 9 dígitos',
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres'
        ];
    }

    public function editUser()
    {
        $this->validate();

        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->phone = $this->phone;
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        return redirect()->route('admin.user')->with('user_edited', true);
    }

    public function mount($user_id)
    {
        $this->user_id = $user_id;

        $user = User::find($this->user_id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->phone = $user->phone;
    }

    public function render()
    {
        $user = User::find($this->user_id);

        return view('livewire.admin.user.admin-user-edit', [
            'user' => $user
        ]);
    }
}
