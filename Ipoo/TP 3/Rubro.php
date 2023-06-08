<?php 

    class Rubro {
        private $descripcion ; 
        private $porcenGananApli ; 

        public function __construct(
            $descripcion, 
            $porcenGananApli
        ) { 
            $this -> descripcion = $descripcion ; 
            $this -> porcenGananApli = $porcenGananApli ;
        }

        public function getDescripcion() {
            return $this -> descripcion ; 
        }
        public function getPorcenGananApli() {
            return $this -> porcenGananApli ;
        }

        public function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion ; 
        }
        public function setPorcenGananApli($porcenGananApli) {
            $this -> porcenGananApli = $porcenGananApli ; 
        }

        public function __toString() {
            return 
            "Descripcion: " . $this -> getDescripcion() . "\n" .
            "Porcentaje de ganancia aplicado al producto: " . $this -> getPorcenGananApli() . "%" . "\n" ; 
        }   
    }