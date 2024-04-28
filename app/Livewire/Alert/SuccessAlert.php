<?php

namespace App\Livewire\Alert;

use Illuminate\Support\Sleep;
use Livewire\Attributes\On;
use Livewire\Component;

class SuccessAlert extends Component
{
    public $show = false;
    public $msg;

    #[On('successAlert')]
    public function showAlert($msg)
    {
        $this->msg = $msg;
        $this->show = true;
    }

    public function closeAlert()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.alert.success-alert');
    }
}
