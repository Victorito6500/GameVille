<?php

namespace App\Livewire\Admin\Platform;

use App\Models\Platform;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminPlatformEdit extends Component
{
    use WithFileUploads;

    public $platform_id;

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

    public function editPlatform()
    {
        $this->validate();

        $platform = Platform::find($this->platform_id);
        $platform->name = $this->name;

        $platform->save();

        return redirect()->route('admin.platform')->with('platform_edited', true);
    }

    public function mount($platform_id)
    {
        $this->platform_id = $platform_id;

        $platform = Platform::find($this->platform_id);

        $this->name = $platform->name;
    }

    public function render()
    {
        $platform = Platform::find($this->platform_id);

        return view('livewire.admin.platform.admin-platform-edit', [
            'platform' => $platform
        ]);
    }
}
