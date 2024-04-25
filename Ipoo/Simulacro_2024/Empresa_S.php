<?php 

    class Empresa_S {
        private $denominacion ; 
        private $direccion ;
        private $coleccClientes ; 
        private $coleccMotos ; 
        private $coleccVentas ; 

        public function __construct(
            $denominacion, 
            $direccion, 
            $coleccClientes, 
            $coleccMotos,
            $coleccVentas
        )
        {   
            $this -> denominacion = $denominacion ;
            $this -> direccion = $direccion ;
            $this -> coleccClientes = $coleccClientes ;
            $this -> coleccMotos = $coleccMotos ;
            $this -> coleccVentas = $coleccVentas ;
        }

        public function getDenominacion() {
            return $this -> denominacion ; 
        }
        public function getDireccion() {
            return $this -> direccion ;
        }
        public function getcoleccClientes() {
            return $this -> coleccClientes ;
        }
        public function getColeccMotos() {
            return $this -> coleccMotos ; 
        }
        public function getColeccVentas() {
            return $this -> coleccVentas ;
        }

        public function setNumero($denominacion) {
            $this -> denominacion = $denominacion ;
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ;
        }
        public function setcoleccClientes($coleccClientes) {
            $this -> coleccClientes = $coleccClientes ;
        }
        public function setColeccMotos($coleccMotos) {
            $this -> coleccMotos = $coleccMotos ;
        }
        public function setColeccVentas($coleccVentas) {
            $this -> coleccVentas = $coleccVentas ;
        }

        public function retornarMoto($codigoMoto) {
            $coleccMotos = $this -> getColeccMotos() ;
            $motoEncontrada = false ;
            $i=0 ;
            $motoRetorno = null ;

            /* while($motoEncontrada == false || $i<=count($coleccMotos)) {
                $moto = $coleccMotos[$i] ;
                $codMoto = $moto -> getCodigo() ;
                if($codMoto == $codigoMoto) {
                    $motoEncontrada = true ;
                    $motoRetorno = $moto ;
                }
                $i++ ;
            } */

                foreach($coleccMotos as $moto) {
                    $codMoto = $moto -> getCodigo() ;
                        if($codMoto == $codigoMoto) {
                            $motoRetorno = $moto ;
                        }
                } 
            return $motoRetorno ;
        }

        public function registrarVenta($colCodigosMoto, $objCliente) {
            $coleccVentas = $this -> getColeccVentas() ;
            $coleccMotos = $this -> getColeccMotos() ;
            $precioFinal = -1 ;
            $ventaRealizada = false ;
            $i = 0 ;

            while($ventaRealizada == false && $i<count($colCodigosMoto)) {
                $cod = $colCodigosMoto[$i] ;
                $motoEncontrada = $this -> retornarMoto($cod) ; 
                    if($motoEncontrada == null) {
                        $activa = false ;
                    } else {
                        $activa = $motoEncontrada -> getActiva() ;
                        if($activa) {
                            $dadoBaja = $objCliente -> getDadoBaja() ;
                                if($dadoBaja == false) {
                                    $numero = count($coleccVentas) ; 
                                    $numero++ ;
                                    $fecha = Date("Y-m-d") ;
                                    $precioFinal = $motoEncontrada -> darPrecioVenta() ;
                                    $venta = new Venta_S($numero, $fecha, $objCliente, $coleccMotos, $precioFinal) ;
                                    $venta -> incorporarMoto($motoEncontrada) ;
                                    array_push($coleccVentas, $venta) ;
                                    $motoEncontrada -> setActiva(false) ;
                                    $this -> setColeccVentas($coleccVentas) ;
                                    $ventaRealizada = true ; 
                                }
                        }
                    }
                $i++ ;
            } 

            /* foreach($colCodigosMoto as $cod) {
                $motoEncontrada = $this -> retornarMoto($cod) ; 
                    if($motoEncontrada == null) {
                        $activa = false ;
                    } else {
                        $activa = $motoEncontrada -> getActiva() ;
                        if($activa) {
                            $dadoBaja = $objCliente -> getDadoBaja() ;
                                if($dadoBaja == false) {
                                    // echo $motoEncontrada ;
                                    $numero = count($coleccVentas) ; 
                                    $numero++ ;
                                    $fecha = Date("Y-m-d") ;
                                    $precioFinal = $motoEncontrada -> darPrecioVenta() ;
                                    $venta = new Venta_S($numero, $fecha, $objCliente, $coleccMotos, $precioFinal) ;
                                    $venta -> incorporarMoto($motoEncontrada) ;
                                    array_push($coleccVentas, $venta) ;
                                    $motoEncontrada -> setActiva(false) ;
                                    $this -> setColeccVentas($coleccVentas) ;
                                }
                                
                        }
                    }
            }  */
            
            return $precioFinal ;
        }

        public function retornarVentasXCliente($tipo,$numDoc) {
            $coleccVentas = $this -> getColeccVentas() ;
            $ventasRealizadas = [] ;

                foreach($coleccVentas as $venta) {
                    $cliente = $venta -> getCLiente() ;
                    $doc = $cliente -> getTipoDoc() ;
                    $nro = $cliente -> getNroDoc() ;
                        if($doc == $tipo) {
                            if($nro == $numDoc) {
                                array_push($ventasRealizadas, $venta) ;
                            }
                        }
                }
            return $ventasRealizadas ;
        }

        public function mostrarClientes() {
            $coleccClientes = $this -> getcoleccClientes() ; 
            $cadenaClientes = "" ; 
            
                foreach($coleccClientes as $cliente) {
                    $cadenaClientes = $cadenaClientes . "\n" . $cliente ; 
                }
            return $cadenaClientes ; 
        }

        public function mostrarMotos() {
            $coleccMotos = $this -> getColeccMotos() ; 
            $cadenaMotos = "" ; 
            
                foreach($coleccMotos as $moto) {
                    $cadenaMotos = $cadenaMotos . "\n" . $moto ; 
                }
            return $cadenaMotos ; 
        }

        public function mostrarVentas() {
            $coleccVentas = $this -> getColeccVentas() ; 
            $cadenaVentas = "" ; 
            
                foreach($coleccVentas as $venta) {
                    $cadenaVentas = $cadenaVentas . "\n" . $venta ; 
                }
            return $cadenaVentas ;
        }

        public function __toString() {
            $cadenaClientes = $this -> mostrarClientes() ;
            $cadenaMotos = $this -> mostrarMotos() ; 
            $cadenaVentas = $this -> mostrarVentas() ;
            return "Denominacion: " . $this -> getDenominacion() . "\n" .
                "Direccion: " . $this -> getDireccion() . "\n" .
                "coleccion de Clientes: " . $cadenaClientes . "\n" .
                "Coleccion de motos: " . $cadenaMotos . "\n" .
                "Coleccion de ventas: " . $cadenaVentas . "\n" ; 
        }
    }