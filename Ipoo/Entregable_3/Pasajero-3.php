<?php 

    class Pasajero {
        private $nombrePasaj ; 
        private $apellidoPasaj ; 
        private $nroDocPasaj ; 
        private $nroTelPasaj ; 
        private $nroAsiento ; 
        private $nroTicket ; 

        public function __construct(
            $nombrePasaj , 
            $apellidoPasaj , 
            $nroDocPasaj , 
            $nroTelPasaj , 
            $nroAsiento , 
            $nroTicket 
        ) {
            $this -> nombrePasaj = $nombrePasaj ; 
            $this -> apellidoPasaj = $apellidoPasaj ;
            $this -> nroDocPasaj = $nroDocPasaj ; 
            $this -> nroTelPasaj = $nroTelPasaj ;
            $this -> nroAsiento = $nroAsiento ; 
            $this -> nroTicket = $nroTicket ; 
        }
 
        public function getNombrePasajero() {
            return $this -> nombrePasaj ; 
        }
        public function getApellidoPasajero() {
            return $this -> apellidoPasaj ; 
        }
        public function getNroDocPasajero() {
            return $this -> nroDocPasaj ; 
        }
        public function getNroTelefPasajero() {
            return $this -> nroTelPasaj ; 
        }
        public function getNroAsiento() {
            return $this -> nroAsiento ; 
        }
        public function getNroTicket() {
            return $this -> nroTicket ; 
        }

        public function setNombrePasajero($nombrePasaj) {
            $this -> nombrePasaj = $nombrePasaj ; 
        }
        public function setApellidoPasajero($apellidoPasaj) {
            $this -> apellidoPasaj = $apellidoPasaj ;   
        }
        public function setNroDocPasajero($nroDocPasaj) {
            $this -> nroDocPasaj = $nroDocPasaj ; 
        }
        public function setNroTelefPasajero($nroTelPasaj) {
            $this -> nroTelPasaj = $nroTelPasaj ; 
        }
        public function setNroAsiento($nroAsiento) {
            $this -> nroAsiento = $nroAsiento ; 
        }
        public function setNroTicket($nroTicket) {
            $this -> nroTicket = $nroTicket ; 
        }

        public function darPorcentajeIncremento() {
            return 0 ; 
        }

        public function __toString() {
            return 
                "Nombre: " . $this -> getNombrePasajero() . "\n" . 
                "Apellido: " . $this -> getApellidoPasajero() . "\n" .  
                "Nro de documento: " . $this -> getNroDocPasajero() . "\n" .  
                "Nro de Telefono: " . $this -> getNroTelefPasajero() . "\n" . 
                "Nro de asiento: " . $this -> getNroAsiento() . "\n" . 
                "Nro de ticket: " . $this -> getNroTicket() ;
        }    
    }