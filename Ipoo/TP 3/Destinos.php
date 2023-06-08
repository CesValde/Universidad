<?php 

    class Destinos {
        private $identificacion ; 
        private $nombreLugar ; 
        private $valorPorDiaXPasaj ; 

        public function __construct(
            $identificacion, 
            $nombreLugar, 
            $valorPorDiaXPasaj
        ) { 
            $this -> identificacion = $identificacion ;                 
            $this -> nombreLugar = $nombreLugar ;             
            $this -> valorPorDiaXPasaj = $valorPorDiaXPasaj ;                 
        }

        public function getIdentificacion() {
            return $this -> identificacion ; 
        }
        public function getNombreLugar() {
            return $this -> nombreLugar ; 
        }
        public function getValorPorDiaXPasaj() {
            return $this -> valorPorDiaXPasaj ; 
        }

        public function setIdentificacion($identificacion) {
            $this -> identificacion = $identificacion ; 
        }
        public function setNombreLugar($nombreLugar) {
            $this -> nombreLugar = $nombreLugar ;   
        }
        public function setValorPorDiaXPasaj($valorPorDiaXPasaj) {
            $this -> valorPorDiaXPasaj = $valorPorDiaXPasaj ; 
        }
       
        public function __toString() {
            return "\n" . 
            "Identificacion: " . $this -> getIdentificacion() . "\n" . 
            "Nombre lugar: " . $this -> getNombreLugar() . "\n" . 
            "Valor del dia por pasajero: " . $this -> getValorPorDiaXPasaj() . "\n" ;
        }

    }