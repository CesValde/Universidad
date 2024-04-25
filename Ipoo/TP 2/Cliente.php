<?php 

    class Cliente {
        private $dni ; 
        private $tipoTramite ;
        //private $cantTramites ; 

        public function __construct(
            $dni, 
            $tipoTramite, 
            //$cantTramites
        ) {
            $this -> dni = $dni ;
            $this -> tipoTramite = $tipoTramite ; 
            //$this -> cantTramites = $cantTramites ;
        }

        public function getDni() {
            return $this -> dni ; 
        }
        public function getTipoTramite() {
            return $this -> tipoTramite ; 
        }
       /*  public function getCantTramites() {
            return $this -> cantTramites  ; 
        } */

        public function setDni($dni) {
            $this -> dni = $dni ; 
        }
        public function setTipoTramite($tipoTramite) {
            $this -> tipoTramite = $tipoTramite ; 
        }
        /* public function setCantTramites($cantTramites) {
            $this -> cantTramites = $cantTramites ; 
        } */

        public function __toString() {
            return "DNI del cliente: " . $this -> getDni() . "\n" . 
            "Tipo de tramite: " . $this -> getTipoTramite() . "\n" ;
                
        }
    }