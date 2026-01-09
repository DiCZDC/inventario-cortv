<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;

class SwiperLayout extends Component
{
    public $slides;
    
    public function mount($slides)
    {
        $this->slides = $slides;
    }

    public function render()
    {
        return view('livewire..dashboard.swiper-layout');
    }
}
