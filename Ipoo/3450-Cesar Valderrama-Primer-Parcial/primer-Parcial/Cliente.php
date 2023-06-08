<?php 

    class Cliente {
        private $nombre ;
        private $apellido ; 
        private $baja ; 
        private $tipoDoc ; 
        private $nroDoc ; 

        public function __construct(
            $nombre,    
            $apellido, 
            $baja, 
            $tipoDoc, 
            $nroDoc    
        ) {
            $this -> nombre = $nombre ; 
            $this -> apellido = $apellido ; 
            $this -> baja = $baja ; 
            $this -> tipoDoc = $tipoDoc ; 
            $this -> nroDoc = $nroDoc ; 
        }
        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getApellido() {
            return $this -> apellido ; 
        }
        public function getBaja() {
            return $this -> baja ; 
        }
        public function getTipoDoc() {
            return $this -> tipoDoc ; 
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
        public function setBaja($baja) {
            $this -> baja = $baja ; 
        }
        public function setTipoDoc($tipoDoc) {
            $this -> tipoDoc = $tipoDoc ; 
        }
        public function setNroDoc($nroDoc) {
            $this -> nroDoc = $nroDoc ; 
        }

        public function __toString() {
            return 
            "Nombre del cliente: " . $this -> getNombre() . "\n" . 
            "Apellido del cliente: " . $this -> getApellido() . "\n" . 
            "Condicion de baja: " . $this -> getBaja() . "\n" . 
            "Tipo de documento: " . $this -> getTipoDoc() . "\n" . 
            "Numero de documento: " . $this -> getNroDoc() . "\n" ;
        } 
    }