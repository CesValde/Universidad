<?php 

    class Banco {
        private $coleccCuentaCorr ; 
        private $coleccCajaAhorro ; 
        private $ultimoValorCuentaAsignado ;    // ultimo dinero ingresado / tipo de cta ?
        private $coleccClientes ; 
        // nro de cuenta ?? 

        public function __construct(
            $coleccCuentaCorr , 
            $coleccCajaAhorro , 
            $ultimoValorCuentaAsignado ,
            $coleccClientes
        )
        {
            $this -> coleccCuentaCorr = $coleccCuentaCorr ;      
            $this -> coleccCajaAhorro = $coleccCajaAhorro ;
            $this -> ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado ;
            $this -> coleccClientes = $coleccClientes ;
        }

        public function getColeccCuentaCorr() {
            return $this -> coleccCuentaCorr ; 
        }
        public function getColeccCajaAhorro() {
            return $this -> coleccCajaAhorro ; 
        }
        public function getUltimoValorCuentasAsignado() {
            return $this -> ultimoValorCuentaAsignado ; 
        }
        public function getColeccClientes() {
            return $this -> coleccClientes ; 
        }

        public function setColeccCuentaCorr($coleccCuentaCorr) {
            $this -> coleccCuentaCorr = $coleccCuentaCorr ; 
        }
        public function setColeccCajaAhorro($coleccCajaAhorro) {
            $this -> coleccCajaAhorro = $coleccCajaAhorro ;   
        }
        public function setUltimoValorCuentasAsignado($ultimoValorCuentaAsignado) {
            $this -> ultimoValorCuentaAsignado = $ultimoValorCuentaAsignado ; 
        }
        public function setColeccClientes($coleccClientes) {
            $this -> coleccClientes = $coleccClientes ; 
        }

        public function incorporarCliente($nuevoCliente) {
            $coleccClientes = $this -> getColeccClientes() ; 
            $existeCliente = false ;

                // valiadacion de si el cliente ya existe
                foreach($coleccClientes as $cliente) {
                    if($nuevoCliente -> getNroCliente() == $cliente -> getNroCliente()) {
                        $existeCliente = true ; 
                    }
                }
                
                // si el cliente no existe se agrega a la coleccion
                if($existeCliente == false) {
                    array_push($coleccClientes, $nuevoCliente) ; 
                    $this -> setColeccClientes($coleccClientes) ; 
                }
            return $existeCliente ;
        }
        
        // que es monto descubierto ??
        public function incorporarCuentaCorriente($nroCliente, $montoDescubierto) { 
            $coleccClientes = $this -> getColeccClientes() ;
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ;
            $incorpora = false ;

                foreach($coleccClientes as $cliente) {
                    if($cliente -> getNroCliente() == $nroCliente) {
                        $incorpora = true ;
                        // cliente no pisaria el valor si se agg 2 clientes?? serian la misma variable
                        $nuevaCtaCorriente = new CuentaCorriente($montoDescubierto, 6000, "fbsdhfghs", $cliente) ;
                        array_push($coleccCuentaCorr, $nuevaCtaCorriente) ; 
                        $this -> setColeccCuentaCorr($coleccCuentaCorr) ;
                    }
                }
            return $incorpora ;  
        }

        public function incorporarCajaAhorro($nroCliente) {
            $coleccClientes = $this -> getColeccClientes() ;
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ;
            $incorpora = false ;

                foreach($coleccClientes as $cliente) {
                    if($cliente -> getNroCliente() == $nroCliente) {
                        $incorpora = true ;
                        // cliente no pisaria el valor si se agg 2 clientes?? serian la misma variable
                        $nuevaCajaAhorro = new CuentaAhorro(6000, "azaaz", $cliente) ;
                        array_push($coleccCajaAhorro, $nuevaCajaAhorro) ; 
                        $this -> setColeccCajaAhorro($coleccCajaAhorro) ;
                    }
                }
            return $incorpora ; 
        }

        public function realizarDeposito($numCuenta, $monto) {
            
        }

        public function realizarRetiro($numCuenta, $monto) {

        }

        public function mostrarCuentasCorrientes() {
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ; 
            $cadenaCtaCorrientes = "" ;

                foreach($coleccCuentaCorr as $ctaCorriente) {
                    $cadenaCtaCorrientes = $cadenaCtaCorrientes . "\n" .
                    "Datos Cuenta: " . "\n" .
                    "Monto maximo: " . $ctaCorriente -> getMontoMax() . "\n" . 
                    "Saldo actual: " . $ctaCorriente -> getSaldo() . "\n" .
                    "Tipo de cuenta: " . $ctaCorriente -> getTipoCuenta() . "\n" .
                    "Clienteeeee: " . $ctaCorriente -> getCliente() . "\n" ;
                }
            return $cadenaCtaCorrientes ;
        }

        public function mostrarCajasAhorro() {
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $cadenaCajaAhorro = "" ;

                foreach($coleccCajaAhorro as $cajaAhorro) {
                   $cadenaCajaAhorro = $cadenaCajaAhorro . "\n" .
                   "Datos Cuenta: " . "\n" .
                   "Saldo actual: " . $cajaAhorro -> getSaldo() . "\n" .
                   "Tipo de cuenta: " . $cajaAhorro -> getTipoCuenta() . "\n" .
                   "Clientuliii: " . $cajaAhorro -> getCliente() . "\n" ;
                }
            return $cadenaCajaAhorro ; 
        }

        public function mostrarClientes() {
            $coleccClientes = $this -> getColeccClientes() ; 
            $cadenaClientes = "" ;

                foreach($coleccClientes as $cliente) {
                   $cadenaClientes = $cadenaClientes . "\n" .
                   "Datos Cliente: " . "\n" .
                    "Numero de cliente: " . $cliente -> getNroCliente() . "\n" .
                    "Nombre: " . $cliente -> getNombre() . "\n" .
                    "Apellido: " . $cliente -> getApellido() . "\n" .
                    "Nro de doc: " . $cliente -> getNroDoc() . "\n" ;   
                }
            return $cadenaClientes ;
        }

        public function __toString() {
            $cadenaCtaCorrientes = $this -> mostrarCuentasCorrientes() ; 
            $cadenaCajaAhorro = $this -> mostrarCajasAhorro() ;
            $cadenaClientes = $this -> mostrarClientes() ;

            // y si quiero usar el to string de cliente.php ?
            return 
                $cadenaCtaCorrientes . "\n" . 
                $cadenaCajaAhorro . "\n" . 
                "Ultimo valor de cuenta asignado: " . $this -> getUltimoValorCuentasAsignado() . "\n" . 
                $cadenaClientes . "\n" ; 
        }
    }