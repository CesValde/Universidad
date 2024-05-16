<?php 

    class PasajeroEspecial extends Pasajero {
        private $sillaRuedas ;
        private $asistencia ;       // embarque o desembarque 
        private $comida ;

        public function __construct(
            // atributos padre
            $nombrePasaj , 
            $apellidoPasaj , 
            $nroDocPasaj , 
            $nroTelPasaj ,
            $nroAsiento , 
            $nroTicket, 

            // atributos hijo
            $sillaRuedas, 
            $asistencia,
            $comida
        ) {
            parent:: __construct(
                $nombrePasaj ,
                $apellidoPasaj ,
                $nroDocPasaj ,
                $nroTelPasaj ,
                $nroAsiento , 
                $nroTicket
            ) ;
            $this -> sillaRuedas = $sillaRuedas ; 
            $this -> asistencia = $asistencia ; 
            $this -> comida = $comida ;
        }

        public function getSillaRuedas() {
            return $this -> sillaRuedas ;
        }

        public function getAsistencia() {
            return $this -> asistencia ;
        }

        public function getComida() {
            return $this -> comida ;
        }

        public function setSillaRuedas($sillaRuedas) {
            $this -> sillaRuedas = $sillaRuedas ;
        }

        public function setAsistencia($asistencia) {
            $this -> asistencia = $asistencia ;
        }

        public function setComida($comida) {
            $this -> $comida = $comida ;
        }

        public function mostrarCondiciones() {
            $sillaRuedas = $this->getSillaRuedas();
            $asistencia = $this->getAsistencia();
            $comida = $this->getComida();
            $cadena = "";
        
            $cadena .= "Silla de ruedas: " . ($sillaRuedas ? "Si" : "No") . "\n";
            $cadena .= "Asistencia: " . ($asistencia ? "Si" : "No") . "\n";
            $cadena .= "Comida: " . ($comida ? "Si" : "No") . "\n";
            return $cadena ;  
        } 

        public function darPorcentajeIncremento() {
            $sillaRuedas = $this -> getSillaRuedas() ; 
            $asistencia = $this -> getAsistencia() ; 
            $comida = $this -> getComida() ; 
            $porcentaje = 0.15 ; 

            if($sillaRuedas) {
                if($asistencia) {
                    if($comida) {
                        $porcentaje = 0.30 ;
                    }
                }
            }
            return $porcentaje ; 
        }

        public function __toString() {
            $cadena = parent:: __toString() ; 
            $cadenaCondiciones = $this -> mostrarCondiciones() ;

            return "\n" .
                "Tipo de pasajero: " . "\n" . 
                "Especial" . "\n" .
                $cadena .= "\n" . 
                "Condiciones del pasajero: " . "\n" .
                $cadenaCondiciones ; 
        }
    }