<?php 

    class Cliente extends Persona {
        private $nroCliente ; 

        public function __construct(
            $nroCliente, 
            $nombre,
            $apellido, 
            $tipoDoc, 
            $nroDoc
            ) {
            parent::__construct($nombre, $apellido, $tipoDoc, $nroDoc) ; 
            $this -> nroCliente = $nroCliente ; 
        }

        public function getNroCliente() {
            return $this -> nroCliente ; 
        }

        public function setNroCliente($nroCliente) {
            $this -> nroCliente = $nroCliente ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ;

            $cadena.= "\n Legajo: " . $this -> getNroCliente() ; 
            return $cadena ; 
        }
    }