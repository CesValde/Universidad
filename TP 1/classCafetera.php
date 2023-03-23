<?php 

    class Cafetera {
        private $capacidadMax ; 
        private $cantActual ; 

        public function __construct($capacidadMax, $cantActual) {
            $this -> capacidadMax = $capacidadMax ; 
            $this -> cantActual = $cantActual ; 
        }

        public function getCapacidadMax() {
            return $this -> capacidadMax ; 
        }
        public function getCantActual() {
            return $this -> cantActual ; 
        }
        public function setCapacidadMax($capacidadMax) {
            return $this -> capacidadMax = $capacidadMax ; 
        }
        public function setCantActual($cantActual) {
            return $this -> cantActual = $cantActual; 
        }



        public function llenarCafetera() {
            $cantActual = $this -> getCapacidadMax() ;
            return $cantActual ; 
        }
        public function servirTaza($cantidad) {
            $cantActual = $this -> getCantActual() ; 
                if($cantidad > $cantActual) {
                    echo "No tengo la cantidad de cafe suficiente" ; 
                    $cantidad = $cantActual ; 
                    $cantActual = 0 ; 
                } elseif($cantidad == $cantActual) {
                    $cantActual = 0 ; 
                } else {
                    
                }
            return $cantActual ; 
        }
        public function vaciarCafetera() {
            $cantActual = $this -> getCantActual() ; 
            $cantActual = 0 ; 
            return $cantActual ; 
        }
        public function agregarCafe($cantidad) {
            $cantActual = $this -> getCantActual() ; 
                if($cantActual > $cantidad) {
                    // ?????
                } else {
                    $cantActual = $cantidad - $cantActual ; 
                }
            return $cantActual ; 
        }
    }