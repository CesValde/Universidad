<?php 

    class Concesionaria {
        private $denominacion ;
        private $direccion ; 
        // coleccion de objetos clientes
        private $coleccClientes ; 
        // coleccion de objetos vehiculos
        private $coleccVehi ; 
        private $coleccVentas ; 

        public function __construct(
            $denominacion ,    
            $direccion , 
            $coleccClientes, 
            $coleccVehi, 
            $coleccVentas   
            ){
            $this -> denominacion = $denominacion ; 
            $this -> direccion = $direccion ; 
            $this -> coleccClientes = $coleccClientes ; 
            $this -> coleccVehi = $coleccVehi ; 
            $this -> coleccVentas = $coleccVentas ;
        }
        public function getDenominacion() {
            return $this -> denominacion ; 
        }
        public function getDireccion() {
            return $this -> direccion ; 
        }
        public function getColeccClientes() {
            return $this -> coleccClientes ; 
        }
        public function getColeccVehi() {
            return $this -> coleccVehi ; 
        }
        public function getColeccVentas() {
            return $this -> coleccVentas ; 
        }

        public function setDenominacion($denominacion) {
            $this -> denominacion = $denominacion ; 
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ; 
        }
        public function setColeccClientes($coleccClientes) {
            $this -> coleccClientes = $coleccClientes ; 
        }
        public function setColeccVehi($coleccVehi) {
            $this -> coleccVehi = $coleccVehi ; 
        }
        public function setColeccVentas($coleccVentas) {
            $this -> coleccVentas = $coleccVentas ; 
        }

        public function mostrarClientes() {
            $coleccClientes = $this -> getColeccClientes() ; 
            $cadenaClientes = "" ; 

                for($i=0 ; count($coleccClientes) ; $i++) {
                    $cadenaClientes = $cadenaClientes . 
                    $coleccClientes[$i] -> getNombre() . "\n" . 
                    $coleccClientes[$i] -> getApellido() . "\n" . 
                    $coleccClientes[$i] -> getBaja() . "\n" . 
                    $coleccClientes[$i] -> getTipoDoc() . "\n" . 
                    $coleccClientes[$i] -> getNroDoc() . "\n" ;
                }
            return $cadenaClientes ; 
        }

        public function retornarVehiculo($codigo) {
            $coleccVehi = $this -> getColeccVehi() ; 

            for($i=0 ; $i<count($coleccVehi) ; $i++) {
                $codigoColecc = $coleccVehi[$i] ; 
                    if($codigo == $codigoColecc) {
                        $vehiculo = $coleccVehi[$i] ; 
                    }
            }
            return $vehiculo ; 
        }

        public function registrarVenta($colCodigosVehiculos, $objCliente) {
            $activo = $objCliente -> getBaja() ; 
            $coleccVehi = $this -> getColeccVehi() ; 

            for($i=0 ; $i<count($colCodigosVehiculos) ; $i++) {
              
            }


            // return 
        }

        public function retornarVentasXCliente($tipoDoc, $nroDoc) {
            $coleccVentas = [] ; 
            $ventaCliente = [
                "tipoDoc" => $tipoDoc , 
                "nroDoc" => $nroDoc 
            ] ; 

            array_push($coleccVentas, $ventaCliente) ; 
            return $coleccVentas ; 
        }
    
        public function __toString() {
            $coleccVehi = $this -> getColeccVehi() ; 
            $cadenaVehiculos = $coleccVehi -> mostrarVehiculos() ; 
            $cadenaClientes = $this -> mostrarClientes() ; 
            return 
            "Denominacion: " . $this -> getDenominacion() . "\n" . 
            "Direccion: " . $this -> getDireccion() . "\n" . 
            "Clientes: " . $cadenaClientes . "\n" . 
            "Coleccion de vehiculos: " . $cadenaVehiculos . "\n" . 
            "Numero de documento: " . $this -> getColeccVentas() . "\n" ;
        } 
    }