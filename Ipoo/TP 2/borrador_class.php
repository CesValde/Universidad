<?php 

    class {
        private $
        private $
        private $
        private $
        private $

        public function __construct(
            ,
            ,
            ,
            ,
        ) {
            $this ->  =  ; 
            $this ->  =  ; 
            $this ->  =  ; 
            $this ->  =  ; 
            $this ->  =  ; 
        }

        public function get() {
            return $this ->  ; 
        }
        
        public function set($) {
            $this ->  = $
        }

        public function mostrarx() {
            $colecc = $this -> getColecc() ; 
            $cadenaColecc = "" ; 
                foreach($colecc as $) {
                    $cadenaColecc = $cadenaColecc . "\n" .
                        "\n" . 
                        "\n" ;
                }
            return $cadenaColecc ; 
        }

        public function __toString() {
            return "" ; 
        }




        public function __toString() {
            $coleccInmuebles = $this -> getColInmueble() ;
            $cantInmuebles = count($coleccInmuebles) ;
            return "Direccion: " . $this -> getDireccion() . "\n" . 
                "Datos del administrador: " . $this -> getObjAdministrador() . "\n" .
                "Cantidad de inmuebles: " . $cantInmuebles . "\n"  ;
        }   

}