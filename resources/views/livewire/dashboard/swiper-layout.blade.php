<!-- slider-wrapper -->
<div class="max-w-[400px] w-full mx-auto overflow-hidden relative slider-wrapper">

    <!-- slides para el carrusel -->
    <div class="card-list swiper-wrapper">
        @foreach ($slides as $slide)
            <livewire:dashboard.slide-swiper :cantidad="$slide['cantidad_actual']" :producto="$slide['producto']->nombre_producto" :unidad="$slide['producto']->unidad_producto" />
        @endforeach
    </div>

    <!-- controles del carrusel -->
        <!-- swiper controls -->
            <div class="flex justify-center items-center gap-4 mt-5 w-full">
            <div class="swiper-slide-button swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-slide-button swiper-button-next"></div>
        </div>
    
</div>
