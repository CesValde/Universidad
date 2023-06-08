<?php

    class PasajeroEstandar extends Pasajero {

        public function __construct(
            // atributos padre 
            $nombrePasaj , 
            $apellidoPasaj , 
            $nroDocPasaj , 
            $nroTelPasaj, 
            $nroAsiento , 
            $nroTicket,
        ) {
            parent:: __construct(
                $nombrePasaj ,
                $apellidoPasaj ,
                $nroDocPasaj ,
                $nroTelPasaj ,
                $nroAsiento , 
                $nroTicket
            ) ;
        }

        public function darPorcentajeIncremento() {
            $porcentaje = 0.10 ; 

            return $porcentaje ; 
        }

        public function __toString() {
            $cadena = parent:: __toString() ;
            return "\n" .
                "Tipo de pasajero: " . "\n" . 
                "Estandar" . "\n" . 
                $cadena . "\n" ; 
        }    
    }

    