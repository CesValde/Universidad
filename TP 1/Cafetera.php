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
            $this -> capacidadMax = $capacidadMax ; 
        }
        public function setCantActual($cantActual) {
            $this -> cantActual = $cantActual; 
        }

        public function llenarCafetera() {
            // setea la cantidad actual con la capacidad maxima
            $this -> setCantActual($this -> getCapacidadMax()) ;
        }

        public function servirTaza($cantidad) {
            $cantActual = $this -> getCantActual() ; 
            $pudoservir = false ;

                if($cantidad > $cantActual) {
                    $this -> setCantActual(0) ; 
                } else {
                    $cantActual = $cantActual - $cantidad ; 
                    $this -> setCantActual($cantActual) ;
                    $pudoservir = true ; 
                }
             return $pudoservir ;
        }
        public function vaciarCafetera() {
            $this -> setCantActual(0) ; 
        }

        public function agregarCafe($cantActual) {
            $this -> setCantActual($cantActual) ; 
        }

        public function __toString() {
            return "Capacidad maxima de la cafetera: " . $this -> getCapacidadMax() . "\n" . 
                "Capacidad actual de la cafetera: " . $this -> getCantActual() . "\n" ;
        }
    }