<?php 

    class Banco {
        private $coleccCuentaCorr ; 
        private $coleccCajaAhorro ; 
        private $ultimoValorCuentaAsignado ;
        private $coleccClientes ; 

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
            $i=0 ;

            // valiadacion de si el cliente ya existe
            while($existeCliente == false && $i < count($coleccClientes)) {
                $cliente = $coleccClientes[$i] ;
                if($nuevoCliente -> getNroCliente() == $cliente -> getNroCliente()) {
                    $existeCliente = true ; 
                }
                $i++ ;
            }

            // si el cliente no existe se agrega a la coleccion
            if($existeCliente == false) {
                array_push($coleccClientes, $nuevoCliente) ; 
                $this -> setColeccClientes($coleccClientes) ; 
                $this -> setUltimoValorCuentasAsignado($nuevoCliente) ;
            }
            return $existeCliente ;
        }
        
        public function incorporarCuentaCorriente($nroCliente, $montoDescubierto) { 
            $coleccClientes = $this -> getColeccClientes() ; 
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ;
            $incorpora = false ;
            $existeCliente = false ;
            $i=0 ;
            $indice = -1 ;

            while($existeCliente == false && $i < count($coleccClientes)) {
                $cliente = $coleccClientes[$i] ;
                if($nroCliente == $cliente -> getNroCliente()) {
                    $existeCliente = true ; 
                    $indice = $i ;
                }
                $i++ ;
            }

            if($existeCliente) {
                $incorpora = true ;
                $cliente = $this -> getColeccClientes()[$indice] ;
                $nuevaCtaCorriente = new CuentaCorriente($montoDescubierto, 6000, "NUEVA CUENTA", $cliente, 3) ;
                $coleccCuentaCorr[] = $nuevaCtaCorriente  ;
                $this -> setColeccCuentaCorr($coleccCuentaCorr) ;
                $this -> setUltimoValorCuentasAsignado($nuevaCtaCorriente) ;
            }
            return $incorpora ;  
        }

        public function incorporarCajaAhorro($nroCliente) {
            $coleccClientes = $this -> getColeccClientes() ;
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ;
            $incorpora = false ;
            $existeCliente = false ;
            $i=0 ;
            $indice = -1 ;

            while($existeCliente == false && $i < count($coleccClientes)) {
                $cliente = $coleccClientes[$i] ;
                if($nroCliente == $cliente -> getNroCliente()) {
                    $existeCliente = true ; 
                    $indice = $i ;
                }
                $i++ ;
            }

            if($existeCliente) {
                $incorpora = true ;
                $cliente = $this -> getColeccClientes()[$indice] ;
                $nuevaCtaAhorro = new CuentaAhorro(6000, "fbsdhfghs", $cliente, 3) ;
                $coleccCajaAhorro[] = $nuevaCtaAhorro ;
                $this -> setColeccCajaAhorro($coleccCajaAhorro) ;
                $this -> setUltimoValorCuentasAsignado($nuevaCtaAhorro) ;
            }
            return $incorpora ; 
        }

        public function realizarDeposito($numCuenta, $monto) {
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ; 
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $coleccionCtas = array_merge($coleccCuentaCorr, $coleccCajaAhorro) ; 
            $i = 0 ;
            $deposito = -2 ;  

            while($deposito = -2 && $i < count($coleccionCtas)) {
                $cuenta = $coleccionCtas[$i] ; 
                    if($numCuenta == $cuenta -> getNroCuenta()) {
                        if($coleccionCtas[$i] -> getTipoCuenta() == "corriente") {
                            $saldo = $coleccionCtas[$i] -> getSaldo() ;
                            $tope = $saldo + $monto ;
                                if($tope > $coleccionCtas[$i] -> getMontoMax()) {
                                    $deposito = -1 ;
                                } else {
                                    $saldo = $saldo + $monto ; 
                                    $coleccionCtas[$i] -> setSaldo($saldo) ;
                                    $this -> setUltimoValorCuentasAsignado($monto) ;
                                }  
                        } else {
                            $saldo = $coleccionCtas[$i] -> getSaldo() ;
                            $saldo = $saldo + $monto ;
                            $coleccionCtas[$i] -> setSaldo($saldo) ;
                            $this -> setUltimoValorCuentasAsignado($monto) ;
                            $deposito = -3 ;
                        }  
                    }
                $i++ ;
            }                  
            return $deposito ;
        }

        public function realizarRetiro($numCuenta, $monto) {
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ; 
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $coleccionCtas = array_merge($coleccCuentaCorr, $coleccCajaAhorro) ; 
            $i = 0 ;
            $retiro = -2 ; 
                
            while($retiro == -2 && $i < count($coleccionCtas)) {
                $cuenta = $coleccionCtas[$i] ; 
                    if($numCuenta == $cuenta -> getNroCuenta()) {
                        if($coleccionCtas[$i] -> getTipoCuenta() == "corriente") {
                            $saldo = $coleccionCtas[$i] -> getSaldo() ;
                            $tope = $saldo + $monto ;
                                if($tope > $coleccionCtas[$i] -> getMontoMax()) {
                                    $retiro = -1 ;
                                } else {
                                    $saldo = $saldo - $monto ; 
                                    $coleccionCtas[$i] -> setSaldo($saldo) ;
                                    $this -> setUltimoValorCuentasAsignado($monto) ;
                                }
                        } else {
                            $saldo = $coleccionCtas[$i] -> getSaldo() ;
                            $saldo = $saldo - $monto ;
                            $coleccionCtas[$i] -> setSaldo($saldo) ;
                            $this -> setUltimoValorCuentasAsignado($monto) ;
                            $retiro = -3 ;
                        }
                    }      
                $i++ ;
            }                     
            return $retiro ;
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
                    "Cliente de la cuenta: " . $ctaCorriente -> getCliente() . "\n" ;
                }
            return $cadenaCtaCorrientes ;
        }

        public function mostrarCajasAhorro() {
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $cadenaCajaAhorro = "" ;

                foreach($coleccCajaAhorro as $cajaAhorro) {
                   $cadenaCajaAhorro = $cadenaCajaAhorro . "\n" .
                   "Datos Cuenta de Ahorro: " . "\n" .
                   "Saldo actual: " . $cajaAhorro -> getSaldo() . "\n" .
                   "Tipo de cuenta: " . $cajaAhorro -> getTipoCuenta() . "\n" .
                   "Cliente de la cuenta: " . $cajaAhorro -> getCliente() . "\n" ;
                }
            return $cadenaCajaAhorro ; 
        }

        public function mostrarClientes() {
            $coleccClientes = $this -> getColeccClientes() ; 
            $cadenaClientes = "" ;

                foreach($coleccClientes as $cliente) {
                   $cadenaClientes = $cadenaClientes . "\n" .
                   "Datos del cliente: " . "\n" .
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

            return "\n" .
                "CUENTAS CORRIENTES: " . "\n" . 
                $cadenaCtaCorrientes . "\n" . 
                "CUENTAS AHORRO: " . "\n" . 
                $cadenaCajaAhorro . "\n" . 
                "Ultimo valor de cuenta asignado: " . $this -> getUltimoValorCuentasAsignado() . "\n" .
                "CLIENTES DEL BANCO" . "\n" .
                $cadenaClientes . "\n" ; 
        }
    }