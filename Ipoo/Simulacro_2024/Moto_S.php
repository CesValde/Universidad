<?php 

    class Moto_S {
        private $codigo ; 
        private $costo ;
        private $anioFabrica ; 
        private $descripcion ; 
        private $porcIncrAnual ; 
        private $activa ;

        public function __construct(
            $codigo, 
            $costo, 
            $anioFabrica, 
            $descripcion,
            $porcIncrAnual,
            $activa
        )
        {   
            $this -> codigo = $codigo ;
            $this -> costo = $costo ;
            $this -> anioFabrica = $anioFabrica ;
            $this -> descripcion = $descripcion ;
            $this -> porcIncrAnual = $porcIncrAnual ;
            $this -> activa = $activa ;
        }

        public function getCodigo() {
            return $this -> codigo ; 
        }
        public function getCosto() {
            return $this -> costo ;
        }
        public function getAnioFabrica() {
            return $this -> anioFabrica ;
        }
        public function getDescripcion() {
            return $this -> descripcion ; 
        }
        public function getPorcIncrAnual() {
            return $this -> porcIncrAnual ;
        }
        public function getActiva() {
            return $this -> activa ;
        }

        public function setCodigo($codigo) {
            $this -> codigo = $codigo ;
        }
        public function setCosto($costo) {
            $this -> costo = $costo ;
        }
        public function setAnioFabrica($anioFabrica) {
            $this -> anioFabrica = $anioFabrica ;
        }
        public function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion ;
        }
        public function setPorcIncrAnual($porcIncrAnual) {
            $this -> porcIncrAnual = $porcIncrAnual ;
        }
        public function setActiva($activa) {
            $this -> activa = $activa ;
        }

        public function darPrecioVenta() {
            $compra = $this -> getCosto() ; 
            $anio = date("Y") - $this -> getAnioFabrica() ; 
            $por_inc_anual = $this -> getPorcIncrAnual() ;
            $por_inc_anual = 0 * $por_inc_anual ;
            $estado = $this -> getActiva() ;
            $venta = -1 ;

                if($estado) {
                    $venta = $compra + $compra * ($anio * $por_inc_anual) ;
                }
            return $venta ; 
        }

        public function __toString() {
            return "Codigo: " . $this -> getCodigo() . "\n" .
                "Costo: " . $this -> getCosto() . "\n" .
                "Año de fabricacion: " . $this -> getAnioFabrica() . "\n" .
                "Descripcion: " . $this -> getDescripcion() . "\n" .
                "Incremento de porcentaje anual: " . $this -> getPorcIncrAnual() . "\n" . 
                "Activa: " . $this -> getActiva() . "\n" ; 
        }
    }