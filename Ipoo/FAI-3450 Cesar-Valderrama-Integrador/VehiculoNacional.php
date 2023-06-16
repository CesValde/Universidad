<?php 

    class VehiculoNacional extends Vehiculo {
        private $descuento ; 

        public function  __construct(
            $codigo,    
            $costo, 
            $anioFabri, 
            $descripcion, 
            $porcenIncreAnual, 
            $activo,
            $descuento
        ) {
            parent:: __construct(
                $codigo,    
                $costo, 
                $anioFabri, 
                $descripcion, 
                $porcenIncreAnual, 
                $activo,
            ) ;
            $this -> descuento = $descuento  ;
        }

        public function getDescuento(){
            return $this -> descuento ; 
        }

        public function setDescuento($descuento){
            $this -> descuento = $descuento ;  
        }

        public function darPrecioVenta() {
            $precioVenta = parent::darPrecioVenta() ; 
            $descuento = ($precioVenta * $this -> getDescuento()) / 100 ;  
            $venta = $precioVenta - $descuento ; 

            return $venta ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ; 

            return $cadena . "\n" .
            "Descuento: " . $this -> getDescuento() ;
        }
    }