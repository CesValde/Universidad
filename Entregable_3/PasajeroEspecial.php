<?php 

    class PasajeroEspecial extends Pasajero {
        private $sillaRuedas ;
        private $asistencia ;       // embarque o desembarque 
        private $comida ;

        public function __construct(
            // atributos padre
            $nombrePasaj , 
            // $apellidoPasaj , 
            $nroAsiento , 
            $nroTicket, 

            // atributos hijo
            $sillaRuedas, 
            $asistencia,
            $comida
        ) {
            parent:: __construct(
                $nombrePasaj, 
                // $apellidoPasaj, 
                $nroAsiento,
                $nroTicket 
            ) ;
            $this -> sillaRuedas = $sillaRuedas ; 
            $this -> asistencia = $asistencia ; 
            $this -> $comida = $comida ;
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
            $sillaRuedas = $this -> getSillaRuedas() ; 
            $asistencia = $this -> getAsistencia() ; 
            $comida = $this -> getComida() ; 
            $cadena = "" ;

                if($sillaRuedas) {
                    if($asistencia) {
                        if($comida) {
                            $cadena .= 
                                "Silla de ruedas: Si" . "\n" . 
                                "Asistencia: Si" . "\n" . 
                                "Comida: Si" . "\n" ;
                        }
                    } if($comida) {
                        $cadena .= 
                        "Silla de ruedas: Si" . "\n" . 
                        "Asistencia: No" . "\n" . 
                        "Comida: Si" . "\n" ;
                    } else {
                        $cadena .= 
                        "Silla de ruedas: Si" . "\n" . 
                        "Asistencia: No" . "\n" . 
                        "Comida: No" . "\n" ;
                    }
                } elseif($asistencia) { 
                    if($comida) {
                        $cadena .= 
                        "Silla de ruedas: No" . "\n" . 
                        "Asistencia: Si" . "\n" . 
                        "Comida: Si" . "\n" ;
                    } else {
                        $cadena .= 
                        "Silla de ruedas: No" . "\n" . 
                        "Asistencia: Si" . "\n" . 
                        "Comida: No" . "\n" ;
                    }
                } else {
                    $cadena .= 
                    "Silla de ruedas: No" . "\n" . 
                    "Asistencia: No" . "\n" . 
                    "Comida: No" . "\n" ;
                }
            return $cadena ; 
        }

        public function __toString() {
            $cadena = parent:: __toString() ; 

            $cadena .= "\n" . 
            "Condiciones del pasajero: " . "\n" .
            "Silla de ruedas: Si" . "\n" . 
            "Asistencia: Si" . "\n" . 
            "Comida: Si" . "\n" ;
        }
    }