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
            $coleccEmpresas = $this -> getColeccionEmpresas() ;
            $i=0 ;
            $j=0 ;

                while($i<count($coleccEmpresas)) {
                    $empresa = $coleccEmpresas[$i] ;
                    $coleccViajes = $empresa -> coleccViajes[$j] ;
                    $nroViaje = $coleccViajes -> nroViaje ; 
                        if($numeroViaje == $nroViaje) {
                            $responsable = $coleccViajes -> responsable ;
                            echo $responsable ;
                        }
                    $i++ ;
                }
            return $responsable ;
        }

        public function __toString() {
            return 
            "Denominacion: " . $this -> getDenominacion() . "\n" .
            "Direccion: " . $this -> getDireccion() . "\n" .
            "Empresas para viajar: " . $this -> getColeccionEmpresas() . "\n" ;
        } 
    }