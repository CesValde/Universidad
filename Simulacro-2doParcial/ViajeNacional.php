<?php 

    class ViajeNacional extends Viaje {
        public function  __construct(
            $destino,
            $horaPartida,
            $horaLlegada,
            $nroViaje,
            $montoBase,
            $fecha, 
            $cantAsientosTotales,
            $cantAsientosDispo,
            $responsable
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
        }

        public function calcularImporteViaje() {
            $cantAsientosDispo = $this -> getCantAsientosDispo() ;
            $cantAsientosTotales = $this -> getCantAsientosTotales() ;
            $montoBase = $this -> getMontoBase() ;
            $descuento = 0.10 ;

            $asientosVendidos = $cantAsientosTotales - $cantAsientosDispo ;
            $importe = $montoBase + (($montoBase * $asientosVendidos) / $cantAsientosTotales) ;
            $descuento = $importe * $descuento ;    
            $importe = $importe - $descuento ;    
            
            return $importe ;
        }

        public function __toString() {
            $importe = $this -> calcularImporteViaje() ;

            return "\n" .
            "Destino: " . $this -> getDestino() . "\n" .
            "Hora de partida: " . $this -> getHoraPartida() . "\n" . 
            "Hora de llegada: " . $this -> getHoraLlegada() . "\n" . 
            "Numero de viaje: " . $this -> getNumeroViaje() . "\n" . 
            "Monto base: " . $this -> getMontoBase() . "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "Cantidad de asientos totales: " . $this -> getCantAsientosTotales() . "\n" . 
            "Cantidad de asientos disponibles: " . $this -> getCantAsientosDispo() . "\n" . 
            "Importe Total: " . $importe . "\n" . 
            "\n" . 
            "Responsable: " . $this -> getResponsable() . "\n" ;
        }
    }