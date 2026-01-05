@section('styles')
    @vite(['resources/css/app.css', 'resources/css/carrusel.css', 'resources/js/carrusel.js', 'resources/js/app.js'])
@endsection

<x-app-layout>
    <div class="h-2 w-full flex justify-center border-b border-gray-100">
        <div class="w-full h-4 bg-repeat-x" style="background-image: url('https://www.oaxaca.gob.mx/cortv/wp-content/themes/temadeps2023/assets/images/greca.png'); background-size: auto 100%;"></div>
    </div>
    @include('partials.header-dashboard')
    {{-- parte semantica, pero corresponde al contenido principal de la pagina --}}
    <section class= "contenido">
        {{-- div que contiene el layout del main del dashboard, tabla, carrsuel y cards de demandas    --}}
        <div class="mt-3 box-border w-full flex flex-row justify-around gap-8 p-8">
            {{-- tabla de los ultimos cambios en el inventario, parte izquierda --}}
            <livewire:dashboard.table />

            {{-- parte derecha del dashboard, carrsuel y cards --}}
            {{-- div con el laayout de la seccion derecha--}}
            <div class="w-[48%] flex flex-col">
                
                {{-- div del layout de los cards de demanda y menos demandado --}}
                <div class="flex flex-row gap-10 mb-2.5 p-[15px] box-border justify-evenly">
                    <livewire:dashboard.dialog-dashboard tipo="demanda" />
                    <livewire:dashboard.dialog-dashboard tipo="menos" />
                </div>

                {{-- div del layout del carrsuel  --}}
                 <!-- carrusel  ayuda dios soy yo de nuevo-->
                 <!-- swiper -->
                <div class="mt-8 w-64 text-left text-red-700 text-2xl font-bold font-['Times_New_Roman']
                    leading-[120%] tracking-[-0.76px] mb-5 self-center" >
                    Productos con bajo stock
                </div>

                <div class="w-full flex justify-center items-center swiper">
                    <livewire:dashboard.swiper-layout />
                </div>

            </div>    


        </div>

    </section>

</x-app-layout>


