<?php 

    class Venta_S {
        private $numero ; 
        private $fecha ;
        private $cliente ; 
        private $coleccMotos ; 
        private $precioFinal ; 

        public function __construct(
            $numero, 
            $fecha, 
            $cliente, 
            $coleccMotos,
            $precioFinal
        )
        {   
            $this -> numero = $numero ;
            $this -> fecha = $fecha ;
            $this -> cliente = $cliente ;
            $this -> coleccMotos = $coleccMotos ;
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
        public function getColeccMotos() {
            return $this -> coleccMotos ; 
        }
        public function getprecioFinal() {
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
        public function setColeccMotos($coleccMotos) {
            $this -> coleccMotos = $coleccMotos ;
        }
        public function setprecioFinal($precioFinal) {
            $this -> precioFinal = $precioFinal ;
        }

        public function incorporarMoto($objMoto) {
            $coleccMotos = $this -> getColeccMotos() ;
            $activa = $objMoto -> getActiva() ;
            $mensaje = "" ;

                if($activa) {
                    $precioFinal = $objMoto -> darPrecioVenta() ;
                    array_push($coleccMotos, $objMoto) ;
                    $this -> setprecioFinal($precioFinal) ;
                } else {
                    $mensaje = "No se pudo incorporar la moto" ;
                }
            return $mensaje ;
        }

        public function mostrarMotos() {
            $coleccMotos = $this -> getColeccMotos() ; 
            $cadenaMotos = "" ; 
            
                foreach($coleccMotos as $moto) {
                    $cadenaMotos = $cadenaMotos . "\n" . $moto ; 
                }
            return $cadenaMotos ; 
        }

        public function __toString() {
            $cadenaMotos = $this -> mostrarMotos() ;
            return "Numero de venta: " . $this -> getNumero() . "\n" .
                "Fecha: " . $this -> getFecha() . "\n" .
                "Cliente: " . $this -> getCliente() . "\n" .
                "Coleccion de motos: " . $cadenaMotos . "\n" .
                "Precio Final: " . $this -> getPrecioFinal() . "\n" ;
        }
    }