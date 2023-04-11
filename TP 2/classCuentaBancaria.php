<?php 

    // incluir test persona ?

    class CuentaBancaria {
        private $nroCuenta ; 
        private $persona ; 
        private $saldoActual ; 
        private $interesAnual ; 

        public function __construct(
            $nroCuenta, 
            $persona, 
            $saldoActual, 
            $interesAnual, 
        ) {
            $this -> nroCuenta = $nroCuenta ; 
            $this -> persona = $persona ; 
            $this -> saldoActual = $saldoActual ;
            $this -> interesAnual = $interesAnual ; 
        }

        public function getNroCuenta() {
            return $this -> nroCuenta ;
        }
        public function getPersona() {
            return $this -> persona ; 
        }
        public function getSaldoActual() {
            return $this -> saldoActual ; 
        }
        public function getInteresAnual() {
            return $this -> interesAnual ; 
        }
        public function setNroCuenta($nroCuenta) {
            $this -> nroCuenta = $nroCuenta ; 
        }
        public function setPersona($persona) {
            $this -> persona = $persona ; 
        }
        public function setSaldoActual($saldoActual) {
            $this -> saldoActual = $saldoActual ; 
        }
        public function setInteresAnual($interesAnual) {
            $this -> interesAnual = $interesAnual ; 
        }

        public function actualizarSaldo() {
            $saldoActual = $this -> getSaldoActual() ; 
            $interesAnual = $this -> getInteresAnual() ; 
            $porcentaje = $interesAnual / 100 ; 
            $interesAnual = ($porcentaje / 365) * $saldoActual ; 
            $saldoActual = $saldoActual + $interesAnual ; 
            $saldoActual = $this -> setSaldoActual($saldoActual) ; 
            return $saldoActual ; 
        }

        public function depositar($cantidad) {
            $saldoActual = $this -> getSaldoActual() ; 
            $saldoActual = $saldoActual + $cantidad ; 
            $this -> setSaldoActual($saldoActual) ; 
            return $cantidad ; 
        }

        public function retirar($cantidad) {
            $disponible = false ; 
            $saldoActual = $this -> getSaldoActual() ; 

                if($saldoActual > 0) {
                    if($saldoActual > $cantidad) {
                        $disponible = true ; 
                        $saldoActual = $saldoActual - $cantidad ; 
                        $this -> setSaldoActual($saldoActual) ; 
                    }
                }
            return $disponible ; 
        }

        public function __toString() {
            return "Numero de cuenta: " . $this -> getNroCuenta() . "\n" .
                "DNI del cliente: " . $this -> getDniCliente() . "\n" . 
                "Saldo actual: " . $this -> getSaldoActual() . "\n" .
                "Interes anual: " . $this -> getInteresAnual() . "%" . "\n" ; 
        }
    }  