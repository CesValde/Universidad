<?php 

    class Persona {
        private $nombre ; 
        private $apellido ; 
        private $tipo ; 
        private $nroDoc ; 

        public function __construct(
            $nombre, 
            $apellido, 
            $tipo, 
            $nroDoc
        ) {
            $this -> nombre = $nombre ; 
            $this -> apellido = $apellido ; 
            $this -> tipo = $tipo ; 
            $this -> nroDoc = $nroDoc ;
        }

        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getApellido() {
            return $this -> apellido ; 
        }
        public function getTipo() {
            return $this -> tipo ; 
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
        public function setTipo($tipo) {
            $this -> tipo = $tipo ; 
        }
        public function setNroDoc($nroDoc) {
            $this -> nroDoc = $nroDoc ; 
        }

        public function __toString() {
            return "Nombre de la persona: " . $this -> getNombre() . "\n" . "Apellido de la persona: " . $this -> getApellido() . "\n" . 
                "Tipo: " . $this -> getTipo() . "\n" . "Nro de documento de la persona: " . $this -> getNroDoc() ; 
        }
    }