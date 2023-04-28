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
            $this -> setEstado("Cerrado") ; 
                if($horaActual >= $hora_desde && $horaActual <= $hora_hasta) {
                    $estado = true ; 
                    $this -> setEstado("Abierto") ; 
                }
            return $estado ; 
        }

        public function abrirDisquera($hora, $minutos) {
            $estado = $this -> dentroHorarioAtencion($hora, $minutos) ; 
                if($estado) {
                    $this -> setEstado("Abierto") ;
                }
        }

        public function cerrarDisquera($hora, $minutos) {
            $estado = $this -> dentroHorarioAtencion($hora, $minutos) ; 
                if($estado == false) {
                    $this -> setEstado("Cerrado") ;
                }
        }

        public function convertirHorasUnixANormal() {
            $hora_desde = $this -> getHora_desde() ; 
            $hora_hasta = $this -> getHora_hasta() ; 
            $hora_desde = date("H:i:s", $hora_desde) ;  // formato hora normal 08:00:00
            $hora_hasta = date("H:i:s", $hora_hasta) ;  // formato hora normal 08:00:00
            $this -> setHora_desde($hora_desde) ; 
            $this -> setHora_hasta($hora_hasta) ;  
        }
 
        public function __toString() { 
            return "\n" . "Horario de apertura: " . $this -> getHora_desde() . "\n" .
                "Horario de cierre: " . $this -> getHora_hasta() . "\n" . 
                "Estado del local: " . $this -> getEstado() . "\n" . 
                "Direccion: " . $this -> getDireccion() . "\n" .
                "\n" .
                "Dueño: " . $this -> getDueño() ;
        }
    } 