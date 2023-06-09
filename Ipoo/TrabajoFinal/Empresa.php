<?php

    class Empresa {
        private $idEmpresa ; 
        private $eNombre ; 
        private $eDireccion ;

        public function __construct(
            $idEmpresa, 
            $eNombre, 
            $eDireccion
        ) { 
            $this -> idEmpresa = $idEmpresa ; 
            $this -> eNombre = $eNombre ; 
            $this -> eDireccion = $eDireccion ; 
        }

        public function getIdEmpresa() {
            return $this -> idEmpresa ; 
        }

        public function getENombre() {
            return $this -> eNombre ; 
        }

        public function getEDireccion() {
            return $this -> eDireccion ; 
        }

        public function setIdEmpresa($idEmpresa) {
            $this -> idEmpresa = $idEmpresa ; 
        }

        public function setENombre($eNombre) {
            $this -> eNombre = $eNombre ; 
        }

        public function setEDireccion($eDireccion) {
            $this -> eDireccion = $eDireccion ; 
        }

        public function __toString() {
            return "\n" . 
            "Id de la empresa: " . $this -> getIdEmpresa() . "\n" .
            "Nombre de la empresa: " . $this -> getENombre() . "\n" .
            "Direccion de la empresa: " . $this -> getEDireccion() . "\n" ;
        }
    }