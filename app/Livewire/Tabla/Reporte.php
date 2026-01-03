<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use App\Models\{
    Producto,
    Salida,
    Entrada,
    Registro
};

class Reporte extends Component
{
    #[Url(history: true)]
        public $fechaInicio;
    #[Url(history: true)]
        public $fechaFin;
    
    public $sortBy = 'id_producto';
    public $sortDir = 'ASC';
    public $pos = 1;

    //Inicializa los totales de entradas y salidas
    public $totalSalida;
    public $totalEntrada;



    public function __construct()
    {
        $this->fechaInicio = date('Y-m-d');
        $this->fechaFin = date('Y-m-d');
    }

    public function setSortBy($sortBy){
        if($sortBy === 'NoFiltro') {
            return;
        }
        if($this->sortBy === $sortBy){
            $this->sortDir = $this->sortDir === 'ASC' ? 'DESC' : 'ASC';
            return;
        }
        $this->sortBy = $sortBy;
        $this->sortDir = 'ASC';
    }

    
    //Calcula el total inicial del producto en la fecha inicial seleccionadas
    #[Computed()]
    public function totalInicial($producto){
        return ($this->totalFinal($producto) + ($this->totalEntradas($producto) - $this->totalSalidas($producto)));
    } 

    //Calcula el total final del producto en la fecha final seleccionada
    #[Computed]
    public function totalFinal($producto){
        //Entradas desde la fecha final hasta hoy
            $entradasSince = Entrada::join('registros', 'entradas.id_entrada', '=', 'registros.id_registro')->whereBetween('registros.fecha_registro', [$this->fechaFin, date('Y-m-d')])->where('registros.producto_id', $producto->id_producto)->sum('entradas.cantidad_entrada');
        //Salidas desde la fecha final hasta hoy
            $salidasSince = Salida::join('registros', 'salidas.id_salida', '=', 'registros.id_registro')->where('registros.producto_id', $producto->id_producto)->whereBetween('salidas.created_at', [$this->fechaFin, date('Y-m-d')])->sum('salidas.cantidad_salida');
        //Diferencia entre entradas y salidas desde la fecha final hasta hoy
        return $producto->cantidad_producto + ($salidasSince-$entradasSince);
    }
    /*



















    Buscar la forma de que se agrupen sumas segun el producto y se pueda acceder basado en eso






















    */

    //Calcula el total de entradas del producto en el rango de fechas seleccionado
    #[Computed()]
    public function totalEntradas(){  
        $Entradas = $this ->entradas();      
        
        return $Entradas->get()->sum('cantidad_entrada');
        // return $registros
        //     ->where('producto_id', $producto->id_producto)
        //     ->sum(function($registro) {
        //     return $registro->entrada->cantidad_entrada ?? 0;
        //     });
    }

    //Calcula el total de salidas del producto en el rango de fechas seleccionado
    #[Computed()]
    public function totalSalidas(){
        $Salidas = $this ->salidas();
        return $Salidas->get()->sum('cantidad_salida');
        // return 1;
        // return Salida::join('registros', 'salidas.id_salida', '=', 'registros.id_registro')
        // ->where('registros.producto_id', $producto->id_producto)
        // ->whereBetween('salidas.created_at', [$this->fechaInicio, $this->fechaFin])
        // ->sum('salidas.cantidad_salida');
    }

    //Entradas
    #[Computed()]
    public function entradas(){
        $registros = $this ->registros();
        return $registros->whereHas('Entrada')->with('Entrada');
    }
    //Salidas
    #[Computed()]
    public function salidas(){
        $registros = $this ->registros();
        return $registros->whereHas('Salida')->with('Salida');
    }
    //Registros
    #[Computed()]
    public function registros(){
        return Registro::whereBetween('fecha_registro',[$this-> fechaInicio,$this->fechaFin]);
    }

    //Productos
    #[Computed()]
    public function productos(){
        return Producto::all();
    }
    //Devuelve todos los productos para el reporte
    public function render()
    {
        return view('livewire.tabla.reporte',[]);
        
    }
}
