<?php 

    class ResponsableV {
        private $nroEmpleado ; 
        private $nroLicencia ; 
        private $nombreEmple ; 
        private $apellEmple ; 

        public function __construct(
            $nroEmpleado, 
            $nroLicencia, 
            $nombreEmple, 
            $apellEmple
        ) {
            $this -> nroEmpleado = $nroEmpleado ; 
            $this -> nroLicencia = $nroLicencia ;
            $this -> nombreEmple = $nombreEmple ; 
            $this -> apellEmple = $apellEmple ;
        }
 
        public function getNroEmpleado() {
            return $this -> nroEmpleado ; 
        }
        public function getNroLicencia() {
            return $this -> nroLicencia ; 
        }
        public function getNombreEmpleado() {
            return $this -> nombreEmple ; 
        }
        public function getApellidoEmpleado() {
            return $this -> apellEmple ; 
        }

        public function setNroEmpleado($nroEmpleado) {
            $this -> nroEmpleado = $nroEmpleado ; 
        }
        public function setNroLicencia($nroLicencia) {
            $this -> nroLicencia = $nroLicencia ;   
        }
        public function setNombreEmpleado($nombreEmple) {
            $this -> nombreEmple = $nombreEmple ; 
        }
        public function setApellidoEmpleado($apellEmple) {
            $this -> apellEmple = $apellEmple ; 
        }

        public function __toString() {
            return "\n" . 
                "Numero de empleado: " . $this -> getNroEmpleado() . "\n" . 
                "Numero de licencia: " . $this -> getNroLicencia() . "\n" . 
                "Nombre del empleado: " . $this -> getNombreEmpleado() . "\n" . 
                "Apellido del empleado: " . $this -> getApellidoEmpleado() . "\n" ;
        }
    }