<?php 

class Producto {
    private $codigoBarra;
    private $marca;
    private $color;
    private $talle;
    private $descripcion;
    private $cantidadEnStock;

    public function __construct($codigoBarra, $marca, $color, $talle, $descripcion, $cantidadEnStock) {
        $this->codigoBarra = $codigoBarra;
        $this->marca = $marca;
        $this->color = $color;
        $this->talle = $talle;
        $this->descripcion = $descripcion;
        $this->cantidadEnStock = $cantidadEnStock;
    }

    public function getCodigoBarra() {
        return $this->codigoBarra;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTalle() {
        return $this->talle;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCantidadEnStock() {
        return $this->cantidadEnStock;
    }

    public function setCodigoBarra($codigoBarra) {
        $this->codigoBarra = $codigoBarra;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function setTalle($talle) {
        $this->talle = $talle;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setCantidadEnStock($cantidadEnStock) {
        $this->cantidadEnStock = $cantidadEnStock;
    }

    /* 
        recibe por parámetro una cantidad y actualiza el valor del stock del producto según corresponda. 
        Si el valor recibido por parámetro es >0, entonces se incrementa el stock y si el valor es <0 
        se decrementa el stock del producto
    */
    public function actualizarStock($cantidad) {
        $cantidadEnStock = $this -> getCantidadEnStock() ;

        if($cantidad > 0) {
            $cantidadEnStock = $cantidadEnStock + $cantidad ;
        } else {
            $cantidadEnStock -= abs($cantidad) ;
        }
        $this -> setCantidadEnStock($cantidadEnStock) ; 
        return $cantidadEnStock ;
    }

    public function __toString() {
        return "Código de Barras: " . $this->getCodigoBarra() . "\n" .
               "Marca: " . $this->getMarca() . "\n" .
               "Color: " . $this->getColor() . "\n" .
               "Talle: " . $this->getTalle() . "\n" .
               "Descripción: " . $this->getDescripcion() . "\n" .
               "Cantidad en Stock: " . $this->getCantidadEnStock() . "\n";
    }
}