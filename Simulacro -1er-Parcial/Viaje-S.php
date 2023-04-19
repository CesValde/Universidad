<?php 

    class Viaje {
        private $destino ; 
        private $horaPartida ; 
        private $horaLlegada ; 
        private $nroViaje ; 
        private $importe ;
        private $fecha ; 
        private $cantAsientosTotales ;
        private $cantAsientosDispo ;
        private $responsable ;

        public function __construct(
            $destino,
            $horaPartida,
            $horaLlegada,
            $nroViaje,
            $importe,
            $fecha, 
            $cantAsientosTotales,
            $cantAsientosDispo,
            $responsable
        ) {
            $this -> destino = $destino ; 
            $this -> horaPartida = $horaPartida ; 
            $this -> horaLlegada = $horaLlegada ; 
            $this -> nroViaje = $nroViaje ; 
            $this -> importe = $importe ;
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
        public function getImporte() {
            return $this -> importe ; 
        }
        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getCantAsientos() {
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
        public function Importe($importe) {
            $this -> importe = $importe ; 
        }
        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setCantAsientos($cantAsientosTotales) {
            $this -> cantAsientosTotales = $cantAsientosTotales ; 
        }
        public function setCantAsientosDispo($cantAsientosDispo) {
            $this -> cantAsientosDispo = $cantAsientosDispo ; 
        }
        public function setResponsable($responsable) {
            $this -> responsable = $responsable ; 
        }

        public function asignarAsientosDisponibles($cantAsientosDispo) {
            
        }

        public function __toString() {
            
        }
    }