<?php 

    class Venta {
        private $numero ;
        private $fecha ; 
        private $cliente ; 
        private $coleccVehi ; 
        private $precioFinal ; 

        public function __construct(
            $numero,    
            $fecha, 
            $cliente , 
            $coleccVehi, 
            $precioFinal   
            ) {
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
                    if($precioFinal > 0) {
                        array_push($coleccVehi, $objVehiculo) ;
                        $this -> setColeccVehi($objVehiculo) ;
                        $objVehiculo -> setPrecioFinal($precioFinal) ;
                    }
            }
        }

        public function mostrarVehiculos() {
            $coleccVehi = $this -> getColeccVehi() ; 
            $cadenaVehi = "" ; 
            
                foreach($coleccVehi as $vehiculo) {
                    $cadenaVehi = $cadenaVehi . $vehiculo ; 
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