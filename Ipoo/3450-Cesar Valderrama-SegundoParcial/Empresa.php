<?php 

    class Empresa {
        private $denominacion ;
        private $direccion ; 
        private $coleccClientes ; 
        private $coleccVehi ; 
        private $coleccVentas ; 

        public function __construct(
            $denominacion ,    
            $direccion , 
            $coleccClientes, 
            $coleccVehi, 
            $coleccVentas   
            ) {
            $this -> denominacion = $denominacion ; 
            $this -> direccion = $direccion ; 
            $this -> coleccClientes = $coleccClientes ; 
            $this -> coleccVehi = $coleccVehi ; 
            $this -> coleccVentas = $coleccVentas ;
        }
        public function getDenominacion() {
            return $this -> denominacion ; 
        }
        public function getDireccion() {
            return $this -> direccion ; 
        }
        public function getColeccClientes() {
            return $this -> coleccClientes ; 
        }
        public function getColeccVehi() {
            return $this -> coleccVehi ; 
        }
        public function getColeccVentas() {
            return $this -> coleccVentas ; 
        }

        public function setDenominacion($denominacion) {
            $this -> denominacion = $denominacion ; 
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ; 
        }
        public function setColeccClientes($coleccClientes) {
            $this -> coleccClientes = $coleccClientes ; 
        }
        public function setColeccVehi($coleccVehi) {
            $this -> coleccVehi = $coleccVehi ; 
        }
        public function setColeccVentas($coleccVentas) {
            $this -> coleccVentas = $coleccVentas ; 
        }

        public function retornarVehiculo($codigo) {
            $coleccVehi = $this -> getColeccVehi() ; 

            $i=0 ; 
            $encontro = false ;

            while($encontro == false && $i<count($coleccVehi)) {
                $codigoColecc = $coleccVehi[$i] -> getCodigo() ; 
                    if($codigo == $codigoColecc) {
                        $vehiculo = $coleccVehi[$i] ; 
                        $encontro = true ; 
                    }
                $i++ ; 
            }
            return $vehiculo ; 
        }

        public function registrarVenta($colCodigosVehiculos, $objCliente) {
            $coleccVehi = $this -> getColeccVehi() ; 
            $coleccVentas = $this -> getColeccVentas() ; 
            $i=0 ; 
            $j=0 ; 
            $encontro = false ; 
            $precioFinal = 0 ; 

                if($objCliente -> getBaja()) {
                    while($encontro == false && $i < count($coleccVehi)) {
                        $vehiculo = $coleccVehi[$i] ; 
                            while($j<count($colCodigosVehiculos) && $encontro == false) {
                                if($colCodigosVehiculos[$j] == $vehiculo -> getCodigo()) {
                                    // en caso de encontrar y nose pueda vender ?? 
                                    // retornos numericos ? -1 -2 para diferentes posibilidades 
                                    if($vehiculo -> getActivo()) {
                                        $encontro = true ; 
                                        $precioFinal = $vehiculo -> darPrecioVenta() ;
                                        $venta = new Venta(1, "26/05/2023", $objCliente, $coleccVehi, $precioFinal) ;
                                        array_push($coleccVentas, $venta) ;
                                        $this -> setColeccVentas($coleccVentas) ;
                                        $vehiculo -> setActivo(false) ;     
                                    }
                                }
                                $j++ ; 
                        } 
                        $j=0 ;
                        $i++ ;
                }
            }   
            return $precioFinal ; 
        }

        public function retornarVentasXCliente($tipoDoc, $nroDoc) {
            $coleccVentas = $this -> getColeccVentas() ; 
            $coleccVentaCliente = [] ; 

                foreach($coleccVentas as $venta) {
                    $cliente = $venta -> getCliente() ; 
                        if($cliente -> getTipoDoc() == $tipoDoc) {
                            if($cliente -> getNroDoc() == $nroDoc) {
                                array_push($coleccVentaCliente, $venta) ; 
                            }
                        }
                }
            return $coleccVentaCliente ; 
        }

        public function informarSumaVentasNacionales() {
            $coleccVentas = $this ->  getColeccVentas(); 
            $total = 0 ; 

                foreach($coleccVentas as $venta) {
                    $coleccVehi = $venta -> getColeccVehi() ; 
                        foreach($coleccVehi as $vehiculo) {
                            $pertenece = $vehiculo instanceof VehiculoNacional ; 
                                if($pertenece) {
                                    $precio = $venta -> getPrecioFinal() ; 
                                    $total = $total + $precio ; 
                                }
                        }
                }
            return $total ; 
        }

        public function informarVentasImportadas() {
            $coleccVentas = $this ->  getColeccVentas(); 
            $coleccVehiImportados = [] ; 

                foreach($coleccVentas as $venta) {
                    $coleccVehi = $venta -> getColeccVehi() ; 
                        foreach($coleccVehi as $vehiculo) {
                            $pertenece = $vehiculo instanceof VehiculoImportado ; 
                                if($pertenece) {
                                    if(!in_array($vehiculo, $coleccVehiImportados)) {
                                        array_push($coleccVehiImportados, $vehiculo) ;
                                        array_push($coleccVehiImportados, $vehiculo) ; 
                                    }
                            }
                        }
                }
            return $coleccVehiImportados ; 
        }

        public function mostrarClientes() {
            $coleccClientes = $this -> getColeccClientes() ; 
            $cadenaClientes = "" ; 

                foreach($coleccClientes as $cliente) {
                    $cadenaClientes = $cadenaClientes . $cliente ; 
                }

            return $cadenaClientes ; 
        }

        public function mostrarVehiculos() {
            $coleccVehi = $this -> getColeccVehi() ; 
            $cadenaVehi = "" ; 

                foreach($coleccVehi as $vehiculo) {
                    $cadenaVehi = $cadenaVehi . $vehiculo ; 
                }
            return $cadenaVehi ; 
        }

        public function mostrarVentas() {
            $coleccVentas = $this -> getColeccVehi() ; 
            $cadenaVentas = "" ; 

                foreach($coleccVentas as $venta) {
                    $cadenaVentas = $cadenaVentas . $venta ; 
                }
            return $cadenaVentas ; 
        }

        public function __toString() {
            $cadenaVehiculos = $this -> mostrarVehiculos() ; 
            $cadenaClientes = $this -> mostrarClientes() ; 
            $cadenaVentas = $this -> mostrarVentas() ; 

            return 
            "Denominacion: " . $this -> getDenominacion() . "\n" . 
            "Direccion: " . $this -> getDireccion() . "\n" . 
            "Clientes: " . "\n" . $cadenaClientes . "\n" . 
            "Coleccion de vehiculos: " . "\n" . $cadenaVehiculos . "\n" . 
            "Coleccion de ventas: " . "\n" . $cadenaVentas . "\n" ;
        } 
    }