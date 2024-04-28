<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Alert\SuccessAlert;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;


class AdminUsers extends Component
{
    use WithPagination;

    // Filter wire:model
    public $searchClientFilter;
    public $searchAdminFilter;

    // Flag for modal
    public $confirmUserDelete;

    public $selected_user_id;

    // Reset page for search filter
    public function updatingSearchClientFilter()
    {
        $this->resetPage();
    }
    public function updatingSearchAdminFilter()
    {
        $this->resetPage();
    }

    public function showConfirmModal($user_id)
    {
        $this->selected_user_id = $user_id;
        $this->confirmUserDelete = true;
    }

    public function deleteUser()
    {
        $user = User::find($this->selected_user_id);
        $user->delete();

        $this->confirmUserDelete = false;

        // Send event to show a success alert
        return $this->dispatch('successAlert', msg: '¡El usuario se ha eliminado correctamente!')->to(SuccessAlert::class);
    }

    public function mount()
    {
        $this->searchClientFilter = '';
        $this->searchAdminFilter = '';

        $this->confirmUserDelete = false;

        $this->selected_user_id = null;

        if (session()->has('user_edited')) {
            $this->dispatch('successAlert', msg: '¡El usuario se ha modifcado correctamente!')->to(SuccessAlert::class);
        }

        if (session()->has('user_created')) {
            $this->dispatch('successAlert', msg: '¡El usuario se ha creado correctamente!')->to(SuccessAlert::class);
        }
    }

    public function render()
    {
        $client_users = User::where('isAdmin', false)
            ->where(function (Builder $query) {
                $query->where('name', 'like', '%' . $this->searchClientFilter . '%')
                    ->orWhere('email', 'like', '%' . $this->searchClientFilter . '%');
            })
            ->paginate(5);

        $admin_users = User::where('isAdmin', true)
            ->where(function (Builder $query) {
                $query->where('name', 'like', '%' . $this->searchAdminFilter . '%')
                    ->orWhere('email', 'like', '%' . $this->searchAdminFilter . '%');
            })
            ->paginate(5);

        $selected_user = $this->selected_user_id ? User::find($this->selected_user_id) : null;

        return view('livewire.admin.user.admin-users', [
            'client_users' => $client_users,
            'admin_users' => $admin_users,
            'selected_user' => $selected_user
        ]);
    }
}
