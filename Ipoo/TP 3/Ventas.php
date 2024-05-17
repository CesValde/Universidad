<?php 

    class Venta2 {
        private $fecha ; 
        private $paqueteTuristico ; 
        private $cantPersonas ;
        private $cliente ;

        public function __construct(
            $fecha, 
            $paqueteTuristico, 
            $cantPersonas, 
            $cliente
        ) { 
            $this -> fecha = $fecha ;                 
            $this -> paqueteTuristico = $paqueteTuristico ;             
            $this -> cantPersonas = $cantPersonas ;          
            $this -> cliente = $cliente ; 
        }

        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getPaquete() {
            return $this -> paqueteTuristico ; 
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
        public function setPaquete($paqueteTuristico) {
            $this -> paqueteTuristico = $paqueteTuristico ;   
        }
        public function setCantidadPersonas($cantPersonas) {
            $this -> cantPersonas = $cantPersonas ; 
        }
        public function setClienteVenta($cliente) {
            $this -> cliente = $cliente ; 
        }

        /* 
            El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del 
            día del paquete, por la cantidad de personas de la venta
        */
        public function darImporteVenta() {
            $paqueteTuristico = $this -> getPaquete() ;
            $cantDias = $paqueteTuristico -> getCantidadDias() ;
            $cantPersonas = $this -> getCantidadPersonas() ;

            $fecha = $paqueteTuristico -> getFechaDesde() ;
            $importeDia = date("d", strtotime($fecha)) ;
            $importeVenta = (($cantDias * $importeDia) * $cantPersonas) ;
            return $importeVenta ;
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "PAQUETE TURISTICO: " . $this -> getPaquete() . 
            "Cantidad de personas: " . $this -> getCantidadPersonas() . "\n" .
            "CLIENTE: " . $this -> getClienteVenta() . "\n" ;
        }
    }