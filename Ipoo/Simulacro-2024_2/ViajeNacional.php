<?php 

    class ViajeNacional extends Viaje {
        private $descuento ; 

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
            $descuento
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
            $this -> descuento = $descuento ; 
        }

        public function getDescuento() {
            return $this -> descuento ; 
        }

        public function setDescuento($descuento) {
            $this -> descuento = $descuento ; 
        }

        public function calcularImporteViaje() {
            $montoBase = parent::calcularImporteViaje() ; 
            $descuento = ($montoBase * $this -> getDescuento()) / 100 ; 
            $importe = $montoBase - $descuento ;    
            
            return $importe ;
        }

        public function __toString() {
            $importe = $this -> calcularImporteViaje() ;
            $cadena = parent:: __toString() ; 

            return "\n" .
            $cadena . 
            "Descuento: " . $this -> getDescuento() . "%" . "\n" . 
            "Importe Total: " . $importe . "\n" ; 
        }
    }