<?php 

    // icnluir la clase padre en la clase hija 
    include_once "Persona_3.php" ; 

    class Cliente extends Persona_3 {
        private $nroCliente ; 

        public function __construct(
                $nroCliente, 
                $nombre,
                $apellido,  
                $nroDoc
            ) {
            parent::__construct($nombre, $apellido, $nroDoc) ; 
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

            $cadena.= "\n" . 
            "Numero de cliente: " . $this -> getNroCliente() ; 
            return $cadena ; 
        }
    }