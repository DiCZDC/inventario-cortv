<div class="w-[43%] bg-white shadow-2xl rounded-2xl flex flex-col content-center pt-6">
    {{-- div de la tabla del dashboard --}}   
        <!-- encabezado-tabla -->
        <div class="text-[#AE2B2F] text-center font-times text-4xl font-bold leading-[120%] tracking-[-0.76px] mt-2 mb-5" style="font-family: 'Times New Roman'">
                <span>Ultimos cambios en el inventario</span>
        </div>
        
        {{-- Ahora si, las filas de la tabla  --}}
        <div class="w-full p-5">
            {{-- cards de la tabla, se mandan llamar desde el componente livewire solo se llaman 3, puede ampliarse --}}
            <livewire:dashboard.card-table />
            <livewire:dashboard.card-table />
            <livewire:dashboard.card-table />

        </div>    


</div>
