<?php 

    class PaquetesTuristicos {
        private $fechaDesde ; 
        private $cantDias ; 
        private $destino ; 
        private $cantTotalPlazas ; 
        private $cantDispoPlazas ; 

        public function __construct(
            $fechaDesde , 
            $cantDias, 
            $destino, 
            $cantTotalPlazas, 
            // $cantDispoPlazas
        ) { 
            $this -> fechaDesde = $fechaDesde ;                 
            $this -> cantDias = $cantDias ;             
            $this -> destino = $destino ;          
            $this -> cantTotalPlazas = $cantTotalPlazas ; 
            // $this -> cantDispoPlazas = $cantDispoPlazas ; 
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
        public function getcantDispoPlazas() {
            return $this -> cantDispoPlazas ; 
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
        public function setcantDispoPlazas($cantDispoPlazas) {
            $this -> cantDispoPlazas = $cantDispoPlazas ; 
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha desde: " . $this -> getFechaDesde() . "\n" . 
            "Cantidad de dias: " . $this -> getCantidadDias() . "\n" . 
            "Destino: " . $this -> getDestino() . "\n" .
            ": " . $this -> getCantTotalPlazas() . "\n" .
            ": " . $this -> getcantDispoPlazas() . "\n" ;
        }
    }