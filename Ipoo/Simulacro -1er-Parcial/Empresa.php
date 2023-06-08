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

        public function darViajeADestino($destino, $cantAsientos) {
            $coleccViajes = $this -> getColeccionViajes() ; 
            $coleccViajesDisp = [] ;

                for($i=0 ; $i<count($coleccViajes) ; $i++) {
                    // $viaje es un objeto 
                    $viaje = $coleccViajes[$i] ; 
                        if($viaje -> getDestino() == $destino 
                            && $viaje -> CantAsientosDispo() >= $cantAsientos) {
                            $coleccViajesDisp[] = $viaje ; 
                        }
                }
            return $coleccViajesDisp ;
        }

        public function incorporarViaje($viaje) {
            $incorpora = true ;
            $coleccViajes = $this -> getColeccionViajes() ;
            $j=0 ;

            while($j<count($coleccViajes) || $incorpora == true) {
                $viajes = $coleccViajes[$j] ;
                // print_r($coleccViajes) ;

                // no entiendo 
                if($viajes -> getDestino() == $viaje -> getDestino()
                    && $viajes -> getFecha() == $viaje -> getFecha()
                    && $viajes -> getHoraPartida() == $viaje -> getHoraPartida()) {
                    $incorpora = false ;
                }
                $j++ ;
            } 
                if($incorpora == true) {
                    $coleccViajes [] = $viaje ;
                    $this -> setColeccionViajes($coleccViajes) ;
                }
            return $incorpora ;
        }

        public function  venderViajeADestino($cantAsientos, $destino, $fecha) {
            
        }

        public function  montoRecaudado() {
            $coleccViajes = $this -> getColeccionViajes() ;
           
        }

        public function __toString() {
            return 
            "Identificacion: " . $this -> getIdentificacion() . 
            "Nombre Empresa: " . $this -> getNombre() .  
            "Viajes: " . $this -> getColeccionViajes() . "\n" ;
        } 
    }