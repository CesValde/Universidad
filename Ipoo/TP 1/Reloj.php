<?php 

    class Reloj {
        private $horas ; 
        private $minutos ; 
        private $segundos ; 

        public function __construct(
            $horas, 
            $minutos, 
            $segundos
        )
        {
            $this -> horas = $horas ;
            $this -> minutos = $minutos ; 
            $this -> segundos = $segundos ; 
        }

        public function getHoras() {
            return $this -> horas ; 
        }
        public function getMinutos() {
            return $this -> minutos ; 
        }
        public function getSegundos() {
            return $this -> segundos ; 
        }
        public function setHoras($horas) {
            $this -> horas = $horas ; 
        }
        public function setMinutos($minutos) {
            $this -> minutos = $minutos ;
        }
        public function setSegundos($segundos) {
            $this -> segundos = $segundos ;
        }

        public function __toString() {
            return "Hora: " . $this -> getHoras() . ":" . $this -> getMinutos() . ":" . $this -> getSegundos() ; 
        } 

        public function puestaACero() {
            $this -> setHoras(0) ; 
            $this -> setMinutos(0) ; 
            $this -> setSegundos(0) ; 
        }

        public function incrementar() {
            $hora = $this -> getHoras() ; 
            $minutos = $this -> getMinutos() ; 
            $segundos = $this -> getSegundos() ;  

            $segundos++ ; 

            if($segundos <= 59) {
                $this -> setSegundos($segundos) ; 
            } else {
                $this -> setSegundos(0) ; 
                $minutos++ ;    
                    if($minutos <= 59) {
                        $this -> setMinutos($minutos) ;  
                    } else {
                        $this -> setMinutos(0) ; 
                        $hora++ ;
                            if($hora <= 23) {
                                $this -> setHoras($hora) ;
                            } else {
                                $this -> setHoras(0) ; 
                            }
                    }
            }
        }
    }