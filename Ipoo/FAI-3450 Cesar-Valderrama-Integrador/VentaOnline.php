<?php 

    class VentaOnline extends Venta {
        private $direccionEnvio ;
        private $dniRec ; 
        private $nroTelf ; 

        public function __construct(
            $numero,    
            $fecha, 
            $cliente , 
            $coleccVehi, 
            $precioFinal,    
            $formaPago,
            $direccionEnvio,
            $dniRec,
            $nroTelf
        ) {
            parent::__construct(
                $numero,
                $fecha,
                $cliente,
                $coleccVehi,
                $precioFinal,
                $formaPago 
            ) ;
                $this -> direccionEnvio = $direccionEnvio ; 
                $this -> dniRec = $dniRec ; 
                $this -> nroTelf = $nroTelf ; 
        }

        public function getDireccionEnvio() {
            return $this -> direccionEnvio ; 
        }
        public function getDniRec() {
            return $this -> dniRec ; 
        }
        public function getNroTelf() {
            return $this -> nroTelf ; 
        }

        public function setDireccionEnvio($direccionEnvio) {
            $this -> direccionEnvio = $direccionEnvio ; 
        }
        public function setDniRec($dniRec) {
            $this -> dniRec = $dniRec ; 
        }
        public function setNroTelf($nroTelf) {
            $this -> nroTelf = $nroTelf ; 
        }

        public function registrarInformacionVenta($info) {
            $info = parent::registrarInformacionVenta($info) ; 
            return $info ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ; 

            return $cadena . "\n" .
            "Direccion de envio: " . $this -> getDireccionEnvio() . "\n" . 
            "Dni del recpetor: " . $this -> getDniRec() . "\n" . 
            "Numero de telefono: " . $this -> getNroTelf() . "\n" ;
        }
    }
