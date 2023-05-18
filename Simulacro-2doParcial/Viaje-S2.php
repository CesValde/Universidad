<?php 

    class Viaje {
        private $destino ; 
        private $horaPartida ; 
        private $horaLlegada ; 
        private $nroViaje ; 
        private $montoBase ;
        private $fecha ; 
        private $cantAsientosTotales ;
        private $cantAsientosDispo ;
        private $responsable ;

        public function __construct(
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
            $this -> destino = $destino ; 
            $this -> horaPartida = $horaPartida ; 
            $this -> horaLlegada = $horaLlegada ; 
            $this -> nroViaje = $nroViaje ; 
            $this -> montoBase = $montoBase ;
            $this -> fecha = $fecha ; 
            $this -> cantAsientosTotales = $cantAsientosTotales ; 
            $this -> cantAsientosDispo = $cantAsientosDispo ; 
            $this -> responsable = $responsable ; 
        }

        public function getDestino() {
            return $this -> destino ; 
        }
        public function getHoraPartida() {
            return $this -> horaPartida ; 
        }
        public function getHoraLlegada() {
            return $this -> horaLlegada ; 
        }
        public function getNumeroViaje() {
            return $this -> nroViaje ; 
        }
        public function getMontoBase() {
            return $this -> montoBase ; 
        }
        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getCantAsientosTotales() {
            return $this -> cantAsientosTotales ; 
        }
        public function getCantAsientosDispo() {
            return $this -> cantAsientosDispo ; 
        }
        public function getResponsable() {
            return $this -> responsable ; 
        }

        public function setDestino($destino) {
            $this -> destino = $destino ; 
        }
        public function setHoraPartida($horaPartida) {
            $this -> horaPartida = $horaPartida ;   
        }
        public function setHoraLlegada($horaLlegada) {
            $this -> horaLlegada = $horaLlegada ; 
        }
        public function setNumeroViaje($nroViaje) {
            $this -> nroViaje = $nroViaje ; 
        }
        public function setMontoBase($montoBase) {
            $this -> montoBase = $montoBase ; 
        }
        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setCantAsientosTotales($cantAsientosTotales) {
            $this -> cantAsientosTotales = $cantAsientosTotales ; 
        }
        public function setCantAsientosDispo($cantAsientosDispo) {
            $this -> cantAsientosDispo = $cantAsientosDispo ; 
        }
        public function setResponsable($responsable) {
            $this -> responsable = $responsable ; 
        }

        public function asignarAsientosDisponibles($cantAsientos) {
            $cantAsientosDispo = $this -> getCantAsientosDispo() ;
            $asignados = false ; 
                if($cantAsientos < $cantAsientosDispo) {
                    $asignados = true ;
                }
            return $asignados ;
        }

        public function calcularImporteViaje() {
            return 0 ;
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