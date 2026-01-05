<!-- slider-wrapper -->
<div class="max-w-[400px] w-full mx-auto overflow-hidden relative slider-wrapper">

    <!-- slides para el carrusel -->
    <div class="card-list swiper-wrapper">
        <livewire:dashboard.slide-swiper />
        <livewire:dashboard.slide-swiper />
        <livewire:dashboard.slide-swiper /> 
        <livewire:dashboard.slide-swiper /> 
    </div>

    <!-- controles del carrusel -->
    <!-- swiper controls -->
    <div class="flex justify-center items-center gap-4 mt-5 w-full">
        <div class="swiper-slide-button swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
        <div class="swiper-slide-button swiper-button-next"></div>
    </div>
    
</div>
