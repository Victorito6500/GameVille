<?php

namespace App\Livewire\Admin\Platform;

use App\Livewire\Alert\SuccessAlert;
use App\Models\Platform;
use Livewire\Component;

class AdminPlatforms extends Component
{
    // Filter wire:model
    public $searchPlatformFilter;

    // Flag for modal
    public $confirmPlatformDelete;

    public $selected_platform_id;

    public function showConfirmModal($platform_id)
    {
        $this->selected_platform_id = $platform_id;
        $this->confirmPlatformDelete = true;
    }

    public function deletePlatform()
    {
        $platform = Platform::find($this->selected_platform_id);
        $platform->delete();

        $this->confirmPlatformDelete = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡La plataforma se ha eliminado correctamente!')->to(SuccessAlert::class);
    }

    public function mount()
    {
        $this->searchPlatformFilter = '';

        $this->confirmPlatformDelete = false;

        $this->selected_platform_id = null;

        if (session()->has('platform_edited')) {
            $this->dispatch('successAlert', msg: '¡La plataforma se ha modifcado correctamente!')->to(SuccessAlert::class);
        }

        if (session()->has('platform_created')) {
            $this->dispatch('successAlert', msg: '¡La plataforma se ha creado correctamente!')->to(SuccessAlert::class);
        }
    }

    public function render()
    {
        $platforms = Platform::where('name', 'like', '%' . $this->searchPlatformFilter . '%')->get();

        $selected_platform = $this->selected_platform_id ? Platform::find($this->selected_platform_id) : null;

        return view('livewire.admin.platform.admin-platforms', [
            'platforms' => $platforms,
            'selected_platform' => $selected_platform
        ]);
    }
}
