<?php 

    class VentaLocal extends Venta {
        private $dia ;
        private $horario ; 

        public function __construct(
            $numero,    
            $fecha, 
            $cliente , 
            $coleccVehi, 
            $precioFinal,    
            $formaPago,
            $dia,
            $horario,
        ) {
            parent::__construct(
                $numero,
                $fecha,
                $cliente,
                $coleccVehi,
                $precioFinal,
                $formaPago 
            ) ;
                $this -> dia = $dia ; 
                $this -> horario = $horario ; 
        }

        public function getDia() {
            return $this -> dia ; 
        }
        public function getHorario() {
            return $this -> horario ; 
        }

        public function setDia($dia) {
            $this -> dia = $dia ; 
        }
        public function setHorario($horario) {
            $this -> horario = $horario ; 
        }

        public function registrarInformacionVenta($info) {
            $info = parent::registrarInformacionVenta($info) ; 

            return $info ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ; 

            return $cadena . "\n" .
            "Dia de la entrega: " . $this -> getDia() . "\n" . 
            "Horario de la entrega: " . $this -> getHorario() . "\n" ;
        }
    }

        

        