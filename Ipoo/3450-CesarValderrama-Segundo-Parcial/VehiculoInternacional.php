<?php 

    class VehiculoImportado extends Vehiculo {
        private $pais ; 
        private $impuestos ; 

        public function  __construct(
            $codigo,    
            $costo, 
            $anioFabri, 
            $descripcion, 
            $porcenIncreAnual, 
            $activo,
            $pais, 
            $impuestos
        ) {
            parent:: __construct(
                $codigo,    
                $costo, 
                $anioFabri, 
                $descripcion, 
                $porcenIncreAnual, 
                $activo,
            ) ;
            $this -> pais = $pais  ;
            $this -> impuestos = $impuestos ; 
        }

        public function getPais(){
            return $this -> pais ; 
        }

        public function setPais($pais){
            $this -> pais = $pais ;  
        }

        public function getImpuestos(){
            return $this -> impuestos ; 
        }

        public function setImpuestos($impuestos){
            $this -> impuestos = $impuestos ;  
        }

        public function darPrecioVenta() {
            $precioVenta = parent::darPrecioVenta() ; 
            $impuestos = ($precioVenta * $this -> getImpuestos()) / 100 ;  
            $venta = $precioVenta + $impuestos ; 

            return $venta ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ; 

            return $cadena . "\n" .
            "Pais: " . $this -> getPais() . "\n" .
            "Impuestos: " . $this -> getImpuestos() ; 
        }
    }