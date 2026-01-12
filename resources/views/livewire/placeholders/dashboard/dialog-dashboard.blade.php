<div class="bg-cortvRojoBasico flex flex-col shadow-lg rounded-[10px] h-[220px] items-center justify-center
              w-[70%] p-[15px] self-center gap-[5px] 
              xs:w-[32%] xs:p-5
              md:gap-3">
    
    <div>
        <div class="svg">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" 
                stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
    
    <div class="flex flex-col items-center gap-[5px]">
        <h1 class="text-white text-center text-[24px] font-bold leading-[120%] tracking-[-0.76px]"
            style="font-family: 'Times New Roman'">
            producto
        </h1>
        <h2 class="text-white text-center text-[20px] font-semibold leading-[120%] tracking-[-0.5px]"
            style="font-family: 'Times New Roman'">
            {{ $tipo === 'demanda' ? 'Producto en demanda' : 'Mas stock en existencia' }}
        </h2>
        <hr class="w-[101%] border-white">
        
        <div class="flex flex-row justify-center gap-[5px] text-white text-center text-[18px] font-normal leading-[120%] tracking-[-0.36px]"
            style="font-family: 'Times New Roman'">
            <span>000</span>
            <span>unidades</span>
            <span>restantes</span>
        </div>
    </div>
</div>