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

        /* 
            Retorna el objeto moto si coincide con el codigo de moto enviado por parametro
        */
        public function retornarMoto($codigoMoto) {
            $coleccMotos = $this -> getColeccMotos() ;
            $motoEncontrada = false ;
            $i=0 ;
            $motoRetorno = null ;
            while($motoEncontrada == false && $i<count($coleccMotos)) {
                $moto = $coleccMotos[$i] ;
                $codMoto = $moto -> getCodigo() ;
                if($codMoto == $codigoMoto) {
                    $motoEncontrada = true ;
                    $motoRetorno = $moto ;
                }
                $i++ ;
            } 
            return $motoRetorno ;
        }

        /*  
            Registra la venta en caso de poder hacerse, retorna el precio final de todas las ventas realizadas de lo contrario retorna 0
        */
        public function registrarVenta($colCodigosMoto, $objCliente) {         
            $totalEnVentas = 0 ;
            foreach ($colCodigosMoto as $cod) {
                $motoEncontrada = $this -> retornarMoto($cod) ; 
                if ($motoEncontrada !== null && $motoEncontrada->getActiva()) {
                    if(!$objCliente -> getDadoBaja()) {
                        $coleccVentas = $this -> getColeccVentas() ;
                        $coleccMotos = $this -> getColeccMotos() ;
                        $numeroVenta = count($coleccVentas) ; 
                        $numeroVenta++ ;
                        $fecha = Date("Y-m-d") ;
                        $precioFinalVenta = $motoEncontrada -> darPrecioVenta() ;
                        $totalEnVentas = $totalEnVentas + $precioFinalVenta ;
                        $venta = new Venta_S($numeroVenta, $fecha, $objCliente, $coleccMotos, $precioFinalVenta) ;
                        $venta -> incorporarMoto($motoEncontrada) ;
                        array_push($coleccVentas, $venta) ;
                        $this -> setColeccVentas($coleccVentas) ; 
                        $motoEncontrada -> setActiva(false) ;            
                    }
                }       
            }
            return $totalEnVentas ;
        }

        /* 
            Retorna un array con las ventas realizadas por un cliente 
        */
        public function retornarVentasXCliente($tipo,$numDoc) {
            $coleccVentas = $this -> getColeccVentas() ;
            $ventasRealizadas = [] ;
                foreach($coleccVentas as $venta) {
                    $cliente = $venta -> getCLiente() ;
                    $doc = $cliente -> getTipoDoc() ;
                    $nro = $cliente -> getNroDoc() ;
                        if($doc == $tipo && $nro == $numDoc) {
                            array_push($ventasRealizadas, $venta) ;
                        }
                }
            return $ventasRealizadas ;
        }

        /* Devuelve una cadena con las ventas de X cliente */
        public function MostrarVentasXCliente($ventasRealizadas) {
            $cadenaVentas = "" ;
            if(!empty($ventasRealizadas)) {
                foreach($ventasRealizadas as $venta) {
                    // Cadena con los datos de la venta   
                    $cadenaVentas = $cadenaVentas . "Numero de venta: " . $venta -> getNumero() . "\n" .
                    "Fecha: " . $venta -> getFecha() . "\n" .
                    "Cliente: " . $venta -> getCliente() .
                    "Precio Final: " . $venta -> getPrecioFinal() . "\n" . "\n" ;
                }
            } else {
                $cadenaVentas = "No hay ventas para mostrar \n" ;
            }
            return $cadenaVentas ;
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
                "Coleccion de Clientes: " . $cadenaClientes . "\n" . "\n" .
                "Coleccion de motos: " . $cadenaMotos . "\n" .
                "Coleccion de ventas: " . $cadenaVentas . "\n" ; 
        }
    }