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
                    $this -> setUltimoValorCuentasAsignado($nuevoCliente) ;
                }
            return $existeCliente ;
        }
        
        public function incorporarCuentaCorriente($nroCliente, $montoDescubierto) { 
            $coleccClientes = $this -> getColeccClientes() ;
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ;
            $incorpora = false ;

                foreach($coleccClientes as $cliente) {
                    if($cliente -> getNroCliente() == $nroCliente) {
                        $incorpora = true ;
                        // cliente no pisaria el valor si se agg 2 clientes?? serian la misma variable
                        // ejercicio listo y no pisa valor esta en una posicion diferente
                        $nuevaCtaCorriente = new CuentaCorriente($montoDescubierto, 6000, "fbsdhfghs", $cliente, 3) ;
                        array_push($coleccCuentaCorr, $nuevaCtaCorriente) ; 
                        $this -> setColeccCuentaCorr($coleccCuentaCorr) ;
                        $this -> setUltimoValorCuentasAsignado($nuevaCtaCorriente) ;
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
                        $nuevaCajaAhorro = new CuentaAhorro(6000, "azaaz", $cliente, 4) ;
                        array_push($coleccCajaAhorro, $nuevaCajaAhorro) ; 
                        $this -> setColeccCajaAhorro($coleccCajaAhorro) ;
                        $this -> setUltimoValorCuentasAsignado($nuevaCajaAhorro) ;
                    }
                }
            return $incorpora ; 
        }

        public function realizarDeposito($numCuenta, $monto) {
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ; 
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $coleccionCtas = array_merge($coleccCuentaCorr, $coleccCajaAhorro) ; 
            $i = 0 ;
            $deposito = -3 ; 
            $existe = false ; 

                // recorro a ver si el nro de cuenta existe 
                foreach($coleccionCtas as $cuenta) {
                    if($numCuenta == $cuenta -> getNroCuenta()) {
                        $existe = true ;
                    } 
                }
                    
                while($numCuenta <> $coleccionCtas[$i] -> getNroCuenta() && $existe == true) {
                    // echo $i ;
                    $i++ ;
                }
                if($numCuenta == $coleccionCtas[$i] -> getNroCuenta()) {
                    if($coleccionCtas[$i] -> getTipoCuenta() == "corriente") {
                        $saldo = $coleccionCtas[$i] -> getSaldo() ;
                        $tope = $saldo + $monto ;
                            if($tope > $coleccionCtas[$i] -> getMontoMax()) {
                                $deposito = -1 ;
                            } else {
                                $this -> setUltimoValorCuentasAsignado($monto) ;
                                $saldo = $saldo + $monto ; 
                                $coleccionCtas[$i] -> setSaldo($saldo) ;
                            }  
                    } else {
                        $saldo = $coleccionCtas[$i] -> getSaldo() ;
                        $saldo = $saldo + $monto ;
                        $coleccionCtas[$i] -> setSaldo($saldo) ;
                        $this -> setUltimoValorCuentasAsignado($monto) ;
                    }
                } else {
                    $deposito = -2 ;
                }                       
            return $deposito ;
        }

        public function realizarRetiro($numCuenta, $monto) {
            $coleccCuentaCorr = $this -> getColeccCuentaCorr() ; 
            $coleccCajaAhorro = $this -> getColeccCajaAhorro() ; 
            $coleccionCtas = array_merge($coleccCuentaCorr, $coleccCajaAhorro) ; 
            $i = 0 ;
            $retiro = -3 ; 
            $existe = false ; 

                // recorro a ver si el nro de cuenta existe 
                foreach($coleccionCtas as $cuenta) {
                    if($numCuenta == $cuenta -> getNroCuenta()) {
                        $existe = true ;
                    } 
                }

                while($numCuenta <> $coleccionCtas[$i] -> getNroCuenta() && $existe == true) {
                    // echo $i ;
                    $i++ ;
                }
                
                if($numCuenta == $coleccionCtas[$i] -> getNroCuenta()) {
                    if($coleccionCtas[$i] -> getTipoCuenta() == "corriente") {
                        $saldo = $coleccionCtas[$i] -> getSaldo() ;
                        $tope = $saldo + $monto ;
                            if($tope > $coleccionCtas[$i] -> getMontoMax()) {
                                $retiro = -1 ;
                            } else {
                                $this -> setUltimoValorCuentasAsignado($monto) ;
                                $saldo = $saldo - $monto ; 
                                $coleccionCtas[$i] -> setSaldo($saldo) ;
                            }
                    } else {
                        $saldo = $coleccionCtas[$i] -> getSaldo() ;
                        $saldo = $saldo - $monto ;
                        $coleccionCtas[$i] -> setSaldo($saldo) ;
                    }
                } else {
                    $retiro = -2 ;
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
            // 

            // y si quiero usar el to string de cliente.php ?
            return 
                $cadenaCtaCorrientes . "\n" . 
                $cadenaCajaAhorro . "\n" . 
                "Ultimo valor de cuenta asignado: " . $this -> getUltimoValorCuentasAsignado() . "\n" . 
                $cadenaClientes . "\n" ; 
        }
    }