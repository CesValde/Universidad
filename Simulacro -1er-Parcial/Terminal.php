<?php 

    class Terminal {
        private $denominacion ; 
        private $direccion ; 
        private $coleccEmpresas ;

        public function __construct(
            $denominacion,
            $direccion,
            $coleccEmpresas
        ) {
            $this -> denominacion = $denominacion ; 
            $this -> direccion = $direccion ; 
            $this -> coleccEmpresas = $coleccEmpresas ; 
        }

        public function getDenominacion() {
            return $this -> denominacion ; 
        }
        public function getDireccion() {
            return $this -> direccion ; 
        }
        public function getColeccionEmpresas() {
            return $this -> coleccEmpresas ; 
        }

        public function setDenominacion($denominacion) {
            $this -> denominacion = $denominacion ; 
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ;   
        }
        public function setColeccionEmpresas($coleccEmpresas) {
            $this -> coleccEmpresas = $coleccEmpresas ; 
        }

        public function ventaAutomatica($cantAsientosReq, $fecha, $destino, $empresa) {
           
        }

        public function empresaMayorRecaudacion() {
           
        }

        public function  responsableViaje($numeroViaje) {
          
        }

        public function  montoRecaudado() {
          
        }

        public function __toString() {
            return " " ;
        } 
    }