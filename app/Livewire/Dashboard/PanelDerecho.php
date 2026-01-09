<?php

namespace App\Livewire\Dashboard;
use Livewire\Attributes\Computed;
use Livewire\Component;
use App\Models\{
  Producto,
  Registro 
};

class PanelDerecho extends Component
{



    //Devuelve el producto con más demanda
    #[Computed(cache: true)]
    public function productoMasDemanda(){
        return $this->productosActuales()->sortByDesc('demanda')->first();
    }
    //Devuelve el producto con más existencias
    #[Computed(cache: true)]
    public function productoMasExistencias(){
        return $this->productosActuales()->sortByDesc('cantidad_actual')->first();
    }

    //Productos con menos existencias
    #[Computed(cache: true)]
    public function productosMenosExistencias(){
        return $this->productosActuales()->sortBy('cantidad_actual')->take(4);
    }
    //Devuelve la cantidad total de los productos actuales
    #[Computed(cache: true)]
    public function productosActuales(){
        return $this->productos->map(function($producto){
            $registros = Registro::where('producto_id', $producto->id_producto);
            $cantidadActual = $registros->where('tipo_registro', 1)->sum('cantidad_registro') - 
                     $registros->where('tipo_registro', 0)->sum('cantidad_registro');
            $demanda = $registros->where('tipo_registro', 0)->count();
            return [
            'producto' => $producto,
            'cantidad_actual' => $cantidadActual,
            'demanda' => $demanda,
            ];
        });
    }
    //Devuelve todos los productos
    #[Computed()]
    public function productos(){
        return Producto::all();
    } 
    public function render()
    {
        return view('livewire.dashboard.panel-derecho');
    }
}
