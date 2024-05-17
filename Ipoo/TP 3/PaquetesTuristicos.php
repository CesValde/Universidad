<?php 

    class PaquetesTuristicos {
        private $fechaDesde ; 
        private $cantDias ; 
        private $destino ; 
        private $cantTotalPlazas ; 
        private $cantDispPlazas ; 

        public function __construct(
            $fechaDesde , 
            $cantDias, 
            $destino, 
            $cantTotalPlazas, 
        ) { 
            $this -> fechaDesde = $fechaDesde ;                 
            $this -> cantDias = $cantDias ;             
            $this -> destino = $destino ;          
            $this -> cantTotalPlazas = $cantTotalPlazas ; 
            $this -> cantDispPlazas = $cantTotalPlazas ; 
        }

        public function getFechaDesde() {
            return $this -> fechaDesde ; 
        }
        public function getCantidadDias() {
            return $this -> cantDias ; 
        }
        public function getDestino() {
            return $this -> destino ; 
        }
        public function getCantTotalPlazas() {
            return $this -> cantTotalPlazas ; 
        }
        public function getCantDispPlazas() {
            return $this -> cantDispPlazas ; 
        }

        public function setFechaDesde($fechaDesde) {
            $this -> fechaDesde = $fechaDesde ; 
        }
        public function setCantidadDias($cantDias) {
            $this -> cantDias = $cantDias ;   
        }
        public function setDestino($destino) {
            $this -> destino = $destino ; 
        }
        public function setCantTotalPlazas($cantTotalPlazas) {
            $this -> cantTotalPlazas = $cantTotalPlazas ; 
        }
        public function setcantDispPlazas($cantDispoPlazas) {
            $this -> cantDispPlazas = $cantDispoPlazas ; 
        }

        /* 
            El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del 
            día del paquete, por la cantidad de personas de la venta
        */
        public function darImporteVenta() {
            $cantDias = $this -> getCantidadDias() ;

            $fechaDesde = $this -> getFechaDesde() ;
            $importeDia = date("d", strtotime($fechaDesde)) ;
            $importeVenta = ($cantDias * $importeDia) ;
            return $importeVenta ;
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha desde: " . $this -> getFechaDesde() . "\n" . 
            "Cantidad de dias: " . $this -> getCantidadDias() . "\n" . 
            "INFORMACION DEL DESTINO: " . $this -> getDestino() . 
            "Cantidad total de plazas: " . $this -> getCantTotalPlazas() . "\n" .
            "Cantidad disponibles de plazas: " . $this -> getcantDispPlazas() . "\n" ;
        }
    }