<?php

namespace App\Livewire\Tabla;

use Livewire\Component;
use App\Models\{
    Producto,
    Salida,
    Entrada,
    Registro
};

class Reporte extends Component
{
    public $pos = 1;
    public $sortBy = 'id_producto';
    public $sortDir = 'ASC';
    public $fechaInicio;
    public $fechaFin;
    
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
    public function totalInicial($producto){
        return ($this->totalFinal($producto) + ($this->totalEntradas($producto) - $this->totalSalidas($producto)));
    } 

    //Calcula el total final del producto en la fecha final seleccionada
    public function totalFinal($producto){
        //Entradas desde la fecha final hasta hoy
            $entradasSince = Entrada::join('registros', 'entradas.id_entrada', '=', 'registros.id_registro')->whereBetween('registros.fecha_registro', [$this->fechaFin, date('Y-m-d')])->where('registros.producto_id', $producto->id_producto)->sum('entradas.cantidad_entrada');
        //Salidas desde la fecha final hasta hoy
            $salidasSince = Salida::join('registros', 'salidas.id_salida', '=', 'registros.id_registro')->where('registros.producto_id', $producto->id_producto)->whereBetween('salidas.created_at', [$this->fechaFin, date('Y-m-d')])->sum('salidas.cantidad_salida');
        //Diferencia entre entradas y salidas desde la fecha final hasta hoy
        return $producto->cantidad_producto + ($salidasSince-$entradasSince);
    }
    
    //Calcula el total de entradas del producto en el rango de fechas seleccionado
    public function totalEntradas($producto){
        return Entrada::join('registros', 'entradas.id_entrada', '=', 'registros.id_registro')
        ->whereBetween('registros.fecha_registro', [$this->fechaInicio, $this->fechaFin])
        ->where('registros.producto_id', $producto->id_producto)
        ->sum('entradas.cantidad_entrada');

    }

    //Calcula el total de salidas del producto en el rango de fechas seleccionado
    public function totalSalidas($producto){
        return Salida::join('registros', 'salidas.id_salida', '=', 'registros.id_registro')
        ->where('registros.producto_id', $producto->id_producto)
        ->whereBetween('salidas.created_at', [$this->fechaInicio, $this->fechaFin])
        ->sum('salidas.cantidad_salida');
    }

    //Devuelve todos los productos para el reporte
    public function render()
    {
        return view('livewire.tabla.reporte',[
            'productos' => Producto::all(),
        ]);
        
    }
}
