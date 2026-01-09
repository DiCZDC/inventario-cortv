<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class SlideSwiper extends Component
{
    public $cantidad = 10;
    public $producto = "Lapices N°2";
    public $unidad = 'unidades';

    public function mount($cantidad, $producto, $unidad)
    {
        $this->cantidad = $cantidad;
        $this->producto = $producto;
        $this->unidad = $unidad;
    }
    public function render()
    {
        return view('livewire..dashboard.slide-swiper');
    }
}
