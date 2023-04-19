<?php 

    class Empresa {
        private $identificacion ; 
        private $nombre ; 
        private $coleccViajes ;

        public function __construct(
            $identificacion,
            $nombre,
            $coleccViajes
        ) {
            $this -> identificacion = $identificacion ; 
            $this -> nombre = $nombre ; 
            $this -> coleccViajes = $coleccViajes ; 
        }

        public function getIdentificacion() {
            return $this -> identificacion ; 
        }
        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getColeccionViajes() {
            return $this -> coleccViajes ; 
        }

        public function setIdentificacion($identificacion) {
            $this -> identificacion = $identificacion ; 
        }
        public function setNombre($nombre) {
            $this -> nombre = $nombre ;   
        }
        public function setColeccionViajes($coleccViajes) {
            $this -> coleccViajes = $coleccViajes ; 
        }

        public function darViajeADestino($destino) {
           
        }

        public function incorporarViaje($viaje) {
           
        }

        public function  venderViajeADestino($canAsientos, $destino, $fecha) {
          
        }

        public function  montoRecaudado() {
          
        }

        public function __toString() {
            return " " ;
        } 
    }