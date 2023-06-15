<?php 

    class Responsable {
        private $rNroEmpleado ; 
        private $rNroLicencia ; 
        private $rNombre ; 
        private $rApellido ; 

        public function __construct(
            $rNroEmpleado, 
            $rNroLicencia, 
            $rNombre, 
            $rApellido
        ) {
            $this -> rNroEmpleado = $rNroEmpleado ; 
            $this -> rNroLicencia = $rNroLicencia ;
            $this -> rNombre = $rNombre ; 
            $this -> rApellido = $rApellido ;
        }
 
        public function getNroEmpleado() {
            return $this -> rNroEmpleado ; 
        }
        public function getNroLicencia() {
            return $this -> rNroLicencia ; 
        }
        public function getNombreEmpleado() {
            return $this -> rNombre ; 
        }
        public function getApellidoEmpleado() {
            return $this -> rApellido ; 
        }

        public function setNroEmpleado($rNroEmpleado) {
            $this -> rNroEmpleado = $rNroEmpleado ; 
        }
        public function setNroLicencia($rNroLicencia) {
            $this -> rNroLicencia = $rNroLicencia ;   
        }
        public function setNombreEmpleado($rNombre) {
            $this -> rNombre = $rNombre ; 
        }
        public function setApellidoEmpleado($rApellido) {
            $this -> rApellido = $rApellido ; 
        }

        public function __toString() {
            return "\n" . 
                "Numero de empleado: " . $this -> getNroEmpleado() . "\n" . 
                "Numero de licencia: " . $this -> getNroLicencia() . "\n" . 
                "Nombre del empleado: " . $this -> getNombreEmpleado() . "\n" . 
                "Apellido del empleado: " . $this -> getApellidoEmpleado() . "\n" ;
        }
    }