<?php 

    class PasajeroVIP extends Pasajero {
        private $nroViajero ;
        private $cantMillas ; 

        public function __construct(
            // atributos padre
            $nombrePasaj , 
            $apellidoPasaj , 
            $nroDocPasaj , 
            $nroTelPasaj ,
            $nroAsiento , 
            $nroTicket, 

            // atributos hijo
            $nroViajero, 
            $cantMillas
        ) {
            parent:: __construct(
                $nombrePasaj, 
                $apellidoPasaj, 
                $nroDocPasaj , 
                $nroTelPasaj ,
                $nroAsiento,
                $nroTicket 
            ) ;
            $this -> nroViajero = $nroViajero ; 
            $this -> cantMillas = $cantMillas ; 
        }

        public function getNroViajero() {
            return $this -> nroViajero ;
        }

        public function getCantMillas() {
            return $this -> cantMillas ;
        }

        public function setNroViajero($nroViajero) {
            $this -> nroViajero = $nroViajero ;
        }

        public function setCantMillas($cantMillas) {
            $this -> cantMillas = $cantMillas ;
        }

        public function darPorcentajeIncremento() {
            $cantMillas = $this -> getCantMillas() ;
            $porcentaje = 0.35 ; 
                if($cantMillas > 300) {
                    $porcentaje = 0.30 ;
                }
            return $porcentaje ; 
        }

        public function __toString() {
            $cadena = parent:: __toString() ; 

            return "\n" . 
                "Tipo de pasajero: " . "\n" .
                "VIP" . "\n" .   
                $cadena .= "\n" . 
                "Numero de Viajero: " . $this -> getNroViajero() . "\n" . 
                "Cantidad de millas: " . $this -> getCantMillas() . "\n" ;
        }
    }