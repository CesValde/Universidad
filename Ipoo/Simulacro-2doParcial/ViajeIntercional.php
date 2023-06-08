<?php 

    class ViajeIntercional extends Viaje {
        private $impuesto ; 
        private $documentacion ; 

        public function  __construct(
            $destino,
            $horaPartida,
            $horaLlegada,
            $nroViaje,
            $montoBase,
            $fecha, 
            $cantAsientosTotales,
            $cantAsientosDispo,
            $responsable, 
            $impuesto, 
            $documentacion
        ) {
            parent:: __construct(
                $destino,
                $horaPartida,
                $horaLlegada,
                $nroViaje,
                $montoBase,
                $fecha, 
                $cantAsientosTotales,
                $cantAsientosDispo,
                $responsable
            ) ;
            $this -> impuesto = $impuesto ; 
            $this -> documentacion = $documentacion ; 
        }

        public function getImpuesto() {
            return $this -> impuesto ; 
        }   

        public function getDocumentacion() {
            return $this -> documentacion ; 
        }   

        public function setImpuesto($impuesto) {
            $this -> impuesto = $impuesto ; 
        }
        
        public function setDocumentacion($documentacion) {
            $this -> documentacion = $documentacion ; 
        }

        public function calcularImporteViaje() {
            $montoBase = parent::calcularImporteViaje() ; 
            $impuesto = ($montoBase * $this -> getImpuesto()) / 100 ; 
            $importe = $montoBase + $impuesto ;    
            
            return $importe ;
        }

        public function __toString() {
            $importe = $this -> calcularImporteViaje() ;
            $cadena = parent:: __toString() ; 

            return "\n" .
            $cadena . 
            "Impuestos: " . $this -> getImpuesto() . "%" . "\n" .
            "Requiere documentacion adicional: " . $this -> getDocumentacion() . "\n" .  
            "Importe Total: " . $importe . "\n" ; 
        }

    }