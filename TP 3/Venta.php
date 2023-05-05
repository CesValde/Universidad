<?php 

    class Venta {
        private $fecha ; 
        private $refPaquete ; 
        private $cantPersonas ; 
        private $cliente ; 

        public function __construct(
            $fecha , 
            $refPaquete, 
            $cantPersonas, 
            $cliente, 
        ) { 
            $this -> fecha = $fecha ;                 
            $this -> refPaquete = $refPaquete ;             
            $this -> cantPersonas = $cantPersonas ;          
            $this -> cliente = $cliente ; 
        }

        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getReferenciaPaquete() {
            return $this -> refPaquete ; 
        }
        public function getCantidadPersonas() {
            return $this -> cantPersonas ; 
        }
        public function getClienteVenta() {
            return $this -> cliente ; 
        }

        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setReferenciaPaquete($refPaquete) {
            $this -> refPaquete = $refPaquete ;   
        }
        public function setCantidadPersonas($cantPersonas) {
            $this -> cantPersonas = $cantPersonas ; 
        }
        public function setClienteVenta($cliente) {
            $this -> cliente = $cliente ; 
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "Referencia del paquete: " . $this -> getReferenciaPaquete() . "\n" . 
            "Cantidad de personas: " . $this -> getCantidadPersonas() . "\n" .
            ": " . $this -> getClienteVenta() . "\n" ;
        }
    }