<?php

namespace App\Livewire\Alert;

use Livewire\Attributes\On;
use Livewire\Component;

class DangerAlert extends Component
{
    public $show = false;
    public $msg;

    #[On('dangerAlert')]
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
        return view('livewire.alert.danger-alert');
    }
}
