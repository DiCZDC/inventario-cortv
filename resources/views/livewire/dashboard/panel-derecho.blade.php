<div class=
    "w-[100%] flex flex-col
    lg:w-[48%]">
        
        {{-- div del layout de los cards de demanda y menos demandado --}}
        <div class="flex gap-5 p-3 flex-col box-border
        xs:flex-row xs:gap-9 xs:mb-2.5 xs:p-[15px]  xs:justify-evenly
        md:gap-9 md:p-[15px] ">
            <livewire:dashboard.dialog-dashboard tipo="demanda" :producto="$this->productoMasDemanda" />
            <livewire:dashboard.dialog-dashboard tipo="mas" :producto="$this->productoMasExistencias" />
        </div>

        {{-- div del layout del carrsuel  --}}
            <!-- carrusel  ayuda dios soy yo de nuevo-->
            <!-- swiper -->
        <div class="mt-8 w-64 text-left text-red-700 text-2xl font-bold font-['Times_New_Roman']
            leading-[120%] tracking-[-0.76px] mb-5 self-center" >
            Productos con bajo stock
        </div>

        <div class="w-full flex justify-center items-center swiper">
            <livewire:dashboard.swiper-layout :slides="$this->productosMenosExistencias" />
        </div>
        

    </div>    


</div>