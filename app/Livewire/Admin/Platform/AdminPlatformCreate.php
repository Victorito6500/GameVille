<?php

namespace App\Livewire\Admin\Platform;

use App\Models\Platform;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminPlatformCreate extends Component
{
    use WithFileUploads;

    public $name;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Un nombre es obligatorio',
            'name.max' => 'El nombre es demasiado largo'
        ];
    }

    public function createPlatform()
    {
        $this->validate();

        $platform = Platform::create([
            'name' => $this->name,
            'img_path' => null
        ]);

        $platform->save();

        return redirect()->route('admin.platform')->with('platform_created', true);
    }

    public function render()
    {
        return view('livewire.admin.platform.admin-platform-create');
    }
}
