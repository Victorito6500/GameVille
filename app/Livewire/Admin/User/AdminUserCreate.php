<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AdminUserCreate extends Component
{
    public $is_admin;

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
            'password' => 'required|string|min:8'
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
            'password.min' => 'La contraseña debe tener mínimo 8 caracteres',
            'password.required' => 'La contraseña es obligatoria'
        ];
    }

    public function createUser()
    {
        $this->validate();

        if ($this->is_admin == 1) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
            $user->isAdmin = true;
            $user->save();
        } else {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'address' => $this->address,
                'phone' => $this->phone,
            ]);
        }

        return redirect()->route('admin.user')->with('user_created', true);
    }

    public function mount($is_admin)
    {
        $this->is_admin = $is_admin;
    }

    public function render()
    {
        return view('livewire.admin.user.admin-user-create');
    }
}
