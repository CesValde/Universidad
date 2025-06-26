<?php

    class Cliente_S {
        private $nombre ; 
        private $apellido ;
        private $dadoBaja ; 
        private $tipoDoc ; 
        private $nroDoc ; 

        public function __construct(
            $nombre, 
            $apellido, 
            $dadoBaja, 
            $tipoDoc,
            $nroDoc
        )
        {   
            $this -> nombre = $nombre ;
            $this -> apellido = $apellido ;
            $this -> dadoBaja = $dadoBaja ;
            $this -> tipoDoc = $tipoDoc ;
            $this -> nroDoc = $nroDoc ;
        }

        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getApellido() {
            return $this -> apellido ;
        }
        public function getDadoBaja() {
            return $this -> dadoBaja ;
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
        public function setDadoBaja($dadoBaja) {
            $this -> dadoBaja = $dadoBaja ;
        }
        public function setTipoDoc($tipoDoc) {
            $this -> tipoDoc = $tipoDoc ;
        }
        public function setNroDoc($nroDoc) {
            $this -> nroDoc = $nroDoc ;
        }

        public function __toString() {
            return "Nombre del cliente: " . $this -> getNombre() . "\n" .
                "Apellido del cliente: " . $this -> getApellido() . "\n" .
                "Estado del cliente: " . ($this->getDadoBaja() ? "Dado de baja" : "Activo") . "\n" .
                "Tipo de documento: " . $this -> getTipoDoc() . "\n" .
                "Nro de documento: " . $this -> getNroDoc() . "\n" ;
        }
    }