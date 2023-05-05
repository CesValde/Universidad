<?php 

    class Venta {
        private $numero ;
        private $fecha ; 
        // objeto cliente
        private $cliente ; 
        // coleccion de objetos vehiculos
        private $coleccVehi ; 
        private $precioFinal ; 

        public function __construct(
            $numero,    
            $fecha, 
            $cliente , 
            $coleccVehi, 
            $precioFinal   
            ){
            $this -> numero = $numero ; 
            $this -> fecha = $fecha ; 
            $this -> cliente = $cliente ; 
            $this -> coleccVehi = $coleccVehi ; 
            $this -> precioFinal = $precioFinal ; 
        }
        public function getNumero() {
            return $this -> numero ; 
        }
        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getCliente() {
            return $this -> cliente ; 
        }
        public function getColeccVehi() {
            return $this -> coleccVehi ; 
        }
        public function getPrecioFinal() {
            return $this -> precioFinal ; 
        }

        public function setNumero($numero) {
            $this -> numero = $numero ; 
        }
        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setCliente($cliente) {
            $this -> cliente = $cliente ; 
        }
        public function setColeccVehi($coleccVehi) {
            $this -> coleccVehi = $coleccVehi ; 
        }
        public function setPrecioFinal($precioFinal) {
            $this -> precioFinal = $precioFinal ; 
        }

        public function incorporarVehiculo($objVehiculo) {
            $costo = $objVehiculo -> getCosto() ; 

            if($objVehiculo -> getActivo()) {
                $precioFinal = $objVehiculo -> darPrecioVenta($costo) ; 
                $objVehiculo -> setPrecioFinal($precioFinal) ; 
                array_push($coleccVehi, $objVehiculo) ;
                $this -> setColeccVehi($objVehiculo) ;
            } 
        }

        public function mostrarVehiculos() {
            $coleccVehi = $this -> getColeccVehi() ; 
            $cadenaVehi = "" ; 
            
                for($i=0 ; $i<count($coleccVehi) ; $i++) {
                    $cadenaVehi = $cadenaVehi . 
                    $coleccVehi[$i] -> getCodigo() . "\n" . 
                    $coleccVehi[$i] -> getCosto() . "\n" . 
                    $coleccVehi[$i] -> getAnioFabri() . "\n" . 
                    $coleccVehi[$i] -> getDescripcion() . "\n" . 
                    $coleccVehi[$i] -> getPorcenIncreAnual() . "\n" . 
                    $coleccVehi[$i] -> getActivo() . "\n" ;
                }
            return $cadenaVehi ; 
        }

        public function __toString() {
            $cadenaVehi = $this -> mostrarVehiculos() ; 
            return 
            "Numero de venta: " . $this -> getNumero() . "\n" . 
            "Fecha de la venta: " . $this -> getFecha() . "\n" . 
            "\n" . 
            "Datos del cliente: " . $this -> getCliente() . "\n" . 
            "\n" . 
            "Coleccion de vehiculos: " . $cadenaVehi. "\n" . 
            "Precio Final " . $this -> getPrecioFinal() . "\n" ;
        }
    }