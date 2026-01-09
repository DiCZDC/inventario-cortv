<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class DialogDashboard extends Component
{   
    public $tipo;
    public $producto;
    

    public function mount($tipo, $producto)
    {
        $this->producto = $producto;
    }

    public function render()
    {
        return view('livewire..dashboard.dialog-dashboard');
    }
}
