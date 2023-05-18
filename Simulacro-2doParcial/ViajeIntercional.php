<?php 

    class ViajeIntercional extends Viaje {
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
            $impuesto = 0.45 ;

            $asientosVendidos = $cantAsientosTotales - $cantAsientosDispo ;
            $importe = $montoBase + (($montoBase * $asientosVendidos) / $cantAsientosTotales) ;
            $impuesto = $importe * $impuesto ;
            $importe = $importe + $impuesto ;    
            
            return $importe ;
        }

        public function __toString() {
            return "\n" .
            "Destino: " . $this -> getDestino() . "\n" .
            "Hora de partida: " . $this -> getHoraPartida() . "\n" . 
            "Hora de llegada: " . $this -> getHoraLlegada() . "\n" . 
            "Numero de viaje: " . $this -> getNumeroViaje() . "\n" . 
            "Monto base: " . $this -> getMontoBase() . "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "Cantidad de asientos totales: " . $this -> getCantAsientosTotales() . "\n" . 
            "Cantidad de asientos disponibles: " . $this -> getCantAsientosDispo() .
            "\n" . 
            "Responsable: " . $this -> getResponsable() . "\n" ;
        }

    }