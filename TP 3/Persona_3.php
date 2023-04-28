<?php 

    class Persona_3 {
        private $nombre ; 
        private $apellido ; 
        private $nroDoc ; 

        public function __construct(
            $nombre, 
            $apellido,  
            $nroDoc
        ) {
            $this -> nombre = $nombre ; 
            $this -> apellido = $apellido ;  
            $this -> nroDoc = $nroDoc ;
        }

        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getApellido() {
            return $this -> apellido ; 
        }
        public function getNroDoc() {
            return $this -> nroDoc ; 
        }

        public function setNombre($nombre) {
            $this -> nombre = $nombre ; 
        }
        public function setApellido($apellido) {
            $this -> apellido = $apellido ;   
        }
        public function setNroDoc($nroDoc) {
            $this -> nroDoc = $nroDoc ; 
        }

        public function __toString() {
            return "\n" . "Nombre de la persona: " . $this -> getNombre() . "\n" . 
                "Apellido de la persona: " . $this -> getApellido() . "\n" . 
                "Nro de documento: " . $this -> getNroDoc() ; 
        }
    }