<?php 

    class PasajeroVIP extends Pasajero {
        private $nroViajero ;
        private $cantMillas ; 

        public function __construct(
            // atributos padre
            $nombrePasaj , 
            // $apellidoPasaj , 
            $nroAsiento , 
            $nroTicket, 

            // atributos hijo
            $nroViajero, 
            $cantMillas
        ) {
            parent:: __construct(
                $nombrePasaj, 
                // $apellidoPasaj, 
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

        public function __toString() {
            $cadena = parent:: __toString() ; 

            $cadena .= "\n" . 
            "Numero de Viajero: " . $this -> getNroViajero() . "\n" . 
            "Cantidad de millas: " . $this -> getCantMillas() . "\n" ;
        }
    }