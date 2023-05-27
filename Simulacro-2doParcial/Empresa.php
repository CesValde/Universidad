<?php

    class Empresa {
        private $identificacion ; 
        private $nombre ; 
        private $coleccViajes ; 

        public function __construct(
            $identificacion, 
            $nombre, 
            $coleccViajes
        ) { 
            $this -> identificacion = $identificacion ; 
            $this -> nombre = $nombre ; 
            $this -> coleccViajes = $coleccViajes ; 
        }

        public function getIdentificacion() {
            return $this -> identificacion ; 
        }
        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getColeccViajes() {
            return $this -> coleccViajes ; 
        }

        public function setIdentificacion($identificacion) {
            $this -> identificacion = $identificacion ; 
        }
        public function setNombre($nombre) {
            $this -> nombre = $nombre ; 
        }
        public function setColeccViajes($coleccViajes) {
            $this -> coleccViajes = $coleccViajes ; 
        }

        public function buscarViaje($codigo) {
            $coleccViajes = $this -> getColeccionViajes() ; 
            $encontro = false ; 
            $i = 0 ; 

            while($encontro == false && $i < count($coleccViajes)) {
                $viaje = $coleccViajes[$i] ; 
                    if($viaje -> getNumeroViaje() == $codigo) {
                        $encontro = true ; 
                    }
                $i++ ; 
            } 

            if($encontro == false) {
                $viaje = -1 ;
            }

            return $viaje ; 
        }

        public function darCostoViaje($codigo) {
            $viaje = $this -> buscarViaje($codigo) ; 
            $importe = $viaje -> calcularImporteViaje() ;

            return $importe ; 
        }

        public function mostrarViajes() {
            $coleccViajes = $this -> getColeccViajes() ; 
            $cadenaViajes = "" ; 

            foreach($coleccViajes as $viaje) {
                $cadenaViajes = $cadenaViajes . $viaje ;
            }    
        
            return $cadenaViajes ; 
        }

        public function __toString() {
            $cadenaViajes = $this -> mostrarViajes() ;

            return "\n" . 
            "Identificacion: " . $this -> getIdentificacion() . "\n" . 
            "Nombre: " . $this -> getNombre() . "\n" . 
            "Coleccion de viajes: " . $cadenaViajes . "\n" ;     
        }
    }