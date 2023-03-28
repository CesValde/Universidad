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
                    $this -> setCantActual(0) ; 
                } else {
                    $cantActual = $cantActual - $cantidad ; 
                    $this -> setCantActual($cantActual) ;
                    $cantidad ; 
                }
            return $cantidad ; 
        }
        public function vaciarCafetera() {
            $cantActual = $this -> setCantActual(0) ; 
            return $cantActual ; 
        }

        public function agregarCafe($cantidad) {
            $cantActual = $this -> setCantActual($cantidad) ; 
            return $cantActual ; 
        }
    }