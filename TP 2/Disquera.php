<?php 

    class Disquera {
        private $hora_desde ;
        private $hora_hasta ;
        private $estado ; 
        private $direccion ; 
        private $dueño ; 

        public function __construct(
            $hora_desde,
            $hora_hasta,
            $estado, 
            $direccion,
            $dueño
        ) {
            $this -> hora_desde = $hora_desde ; 
            $this -> hora_hasta = $hora_hasta ; 
            $this -> estado = $estado ; 
            $this -> direccion = $direccion ;
            $this -> dueño = $dueño ; 
        }

        public function getHora_desde() {
            return $this -> hora_desde ;
        }
        public function getHora_hasta() {
            return $this -> hora_hasta ; 
        }
        public function getEstado() {
            return $this -> estado ; 
        }
        public function getDireccion() {
            return $this -> direccion ; 
        }
        public function getDueño() {
            return $this -> dueño ; 
        }

        public function setHora_desde($hora_desde) {
            $this -> hora_desde = $hora_desde ; 
        }
        public function setHora_hasta($hora_hasta) {
            $this -> hora_hasta = $hora_hasta ; 
        }
        public function setEstado($estado) {
            $this -> estado = $estado ; 
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ; 
        }
        public function setDueño($dueño) {
            $this -> dueño = $dueño ; 
        }

        public function dentroHorarioAtencion($hora, $minutos) {
            $hora_desde = $this -> getHora_desde() ; 
            $hora_hasta = $this -> getHora_hasta() ; 
            $horaActual = strtotime("$hora:$minutos") ; 
            $estado = false ; 
                if($horaActual >= $hora_desde && $horaActual <= $hora_hasta) {
                    $estado = true ; 
                }
            return $estado ; 
        }

        public function abrirDisquera($hora, $minutos) {
            $hora_desde = $this -> getHora_desde() ; 
            $hora_hasta = $this -> getHora_hasta() ; 
            $horaActual = strtotime("$hora:$minutos") ; 
                if($horaActual >= $hora_desde && $horaActual <= $hora_hasta) {
                    $this -> setEstado("abierto") ; 
                }
            // return ?
        }

        public function cerrarDisquera($hora, $minutos) {
            $hora_desde = $this -> getHora_desde() ; 
            $hora_hasta = $this -> getHora_hasta() ; 
            $horaActual = strtotime("$hora:$minutos") ; 
                if($horaActual <= $hora_desde && $horaActual >= $hora_hasta) {
                    $this -> setEstado("cerrado") ; 
                }
            // return ?
        }

        public function convertirHorasUnixANormal() {
            $hora_desde = $this -> getHora_desde() ; 
            $hora_hasta = $this -> getHora_hasta() ; 
            $hora_desde = date("H:i:s", $hora_desde) ;
            $hora_hasta = date("H:i:s", $hora_hasta) ;
            $this -> setHora_desde($hora_desde) ; 
            $this -> setHora_hasta($hora_hasta) ;  
        }
 
        public function __toString() { 
            return "\n" . "Horario de apertura: " . $this -> getHora_desde() . "\n" .
                "Horario de cierre: " . $this -> getHora_hasta() . "\n" . 
                "Estado del local: " . $this -> getEstado() . "\n" . 
                "Direccion: " . $this -> getDireccion() . "\n" .
                "Dueño: " . $this -> getDueño() . "\n" ;
        }
    } 