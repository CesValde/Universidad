<?php

    /* Para el testLocal */
    class Cliente2 extends Persona_3 {
        private $tipoDoc ; 

        public function __construct(
                $tipoDoc, 
                $nombre,
                $apellido,  
                $nroDoc
            ) {
            parent:: __construct(
                $nombre, 
                $apellido, 
                $nroDoc
            ) ; 
            $this -> tipoDoc = $tipoDoc ; 
        }

        public function getTipoDoc() {
            return $this -> tipoDoc ; 
        }

        public function setTipoDoc($tipoDoc) {
            $this -> tipoDoc = $tipoDoc ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ;

            $cadena.= "\n" . 
            "Tipo de documento del cliente: " . $this -> getTipoDoc() ;
            return $cadena ; 
        }
    }   