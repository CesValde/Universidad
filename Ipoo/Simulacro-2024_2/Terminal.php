<?php 

    class Terminal {
        private $denominacion ; 
        private $direccion ; 
        private $coleccEmpresas ; 

        public function __construct(
            $denominacion, 
            $direccion, 
            $coleccEmpresas
        ) { 
            $this -> denominacion = $denominacion ; 
            $this -> direccion = $direccion ; 
            $this -> coleccEmpresas = $coleccEmpresas ; 
        }

        public function getDenominacion() {
            return $this -> denominacion ; 
        }
        public function getDireccion() {
            return $this -> direccion ; 
        }
        public function getColeccEmpresas() {
            return $this -> coleccEmpresas ; 
        }

        public function setDenominacion($denominacion) {
            $this -> denominacion = $denominacion ; 
        }
        public function seDireccion($direccion) {
            $this -> direccion = $direccion ; 
        }
        public function setColeccEmpresas($coleccEmpresas) {
            $this -> coleccEmpresas = $coleccEmpresas ; 
        }

        public function darViajeMenorValor() {
            $coleccEmpresas = $this -> getColeccEmpresas() ; 
            $menorValor = 9999999999 ; 
            $i = 0 ; 

            foreach($coleccEmpresas as $empresa) {
                $coleccViajes = $empresa -> getColeccViajes() ;
                for($j=0 ; $j<count($coleccViajes) ; $j++) {
                    $viaje = $coleccViajes[$j] ;
                    $montoBase = $viaje -> getMontoBase() ; 
                        if($montoBase < $menorValor) {
                            $menorValor = $montoBase ;
                            $coleccViajesMenorValor[$i] = $viaje ; 
                        }
                }
                $i++ ; 
                $menorValor = 9999999999 ; 
            }
            return $coleccViajesMenorValor ; 
        }

        public function mostrarEmpresas() {
            $coleccEmpresas = $this -> getColeccEmpresas() ; 
            $cadenaEmpresas = "" ; 

            foreach($coleccEmpresas as $empresa) {
                $cadenaEmpresas = $cadenaEmpresas . $empresa ;
            }    
            return $cadenaEmpresas ;
        }

        public function __toString() {
            $cadenaEmpresas = $this -> mostrarEmpresas() ; 
            return 
                "Denominacion: " . $this -> getDenominacion() . "\n" . 
                "Direccion: " . $this -> getDireccion() . "\n" . 
                "Empresas: " . $cadenaEmpresas . "\n" ; 
        }
    }