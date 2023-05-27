<?php 

    class Vehiculo {
        private $codigo ;
        private $costo ; 
        private $anioFabri ; 
        private $descripcion ; 
        private $porcenIncreAnual ; 
        private $activo ;       // boolean

        public function __construct(
            $codigo,    
            $costo, 
            $anioFabri, 
            $descripcion, 
            $porcenIncreAnual, 
            $activo  
            ) {
            $this -> codigo = $codigo ; 
            $this -> costo = $costo ; 
            $this -> anioFabri = $anioFabri ; 
            $this -> descripcion = $descripcion ; 
            $this -> porcenIncreAnual = $porcenIncreAnual ;
            $this -> activo = $activo ; 
        }
        public function getCodigo() {
            return $this -> codigo ; 
        }
        public function getCosto() {
            return $this -> costo ; 
        }
        public function getAnioFabri() {
            return $this -> anioFabri ; 
        }
        public function getDescripcion() {
            return $this -> descripcion ; 
        }
        public function getPorcenIncreAnual() {
            return $this -> porcenIncreAnual ; 
        }
        public function getActivo() {
            return $this -> activo ; 
        }

        public function setCodigo($codigo) {
            $this -> codigo = $codigo ; 
        }
        public function setCosto($costo) {
            $this -> costo = $costo ; 
        }
        public function setAnioFabri($anioFabri) {
            $this -> anioFabri = $anioFabri ; 
        }
        public function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion ; 
        }
        public function setPorcenIncreAnual($porcenIncreAnual) {
            $this -> porcenIncreAnual = $porcenIncreAnual ; 
        }
        public function seActivo($activo) {
            $this -> activo = $activo ; 
        }

        public function darPrecioVenta() {
            $compra = $this -> getCosto() ; 
            $porIncAnual = $this -> getPorcenIncreAnual() ; 
            $anioFabri = $this -> getAnioFabri() ; 
            $disponible = $this -> getActivo() ; 
            $anioActual = 2023 ; 
            $anio = $anioActual - $anioFabri ;  
            
                if($disponible) {
                    $venta = $compra + $compra * ($anio * $porIncAnual) ; 
                } else {
                    $venta = -1 ;  
                }
            return $venta ;  
        }

        public function __toString() {
            return 
            "Codigo del vehiculo: " . $this -> getCodigo() . "\n" . 
            "Costo: " . $this -> getCosto() . "\n" . 
            "Año de fabricacion: " . $this -> getAnioFabri() . "\n" . 
            "Descripcion: " . $this -> getDescripcion() . "\n" . 
            "Porcentaje de incremento anual: " . $this -> getPorcenIncreAnual() . "\n" .
            "Disponible: " . $this -> getActivo() . "\n" ;
        }
    }