<?php 

    class Local {
        private $coleccProducImpor ; 
        private $coleccProducRegio ; 
        private $coleccVentas ; 

        public function __construct(
            $coleccProducImpor, 
            $coleccProducRegio, 
            $coleccVentas 
        ) {
            $this -> coleccProducImpor = $coleccProducImpor ;
            $this -> coleccProducRegio = $coleccProducRegio ;
            $this -> coleccVentas = $coleccVentas ;
        }

        public function getColeccProducImpor() {
            return $this -> coleccProducImpor ;
        }
        public function getColeccProducRegio() {
            return $this -> coleccProducRegio ;
        }
        public function getColeccVentas() {
            return $this -> coleccVentas ;
        }

        public function setColeccProducImpor($coleccProducImpor) {
            $this -> coleccProducImpor = $coleccProducImpor ;
        }
        public function setColeccProducRegio($coleccProducRegio) {
            $this -> coleccProducRegio = $coleccProducRegio ;
        }
        public function setColeccVentas($coleccVentas) {
            $this -> coleccVentas = $coleccVentas ;
        }

        public function incorporarProductoLocal($objProducto) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $incorpora = true ;
            $i = 0 ;

                while($incorpora == true && $i < count($coleccProductos)) {
                    $producto = $coleccProductos[$i] ;
                    $codigoBarra = $producto -> getCodigoBarra() ;
                    $codigoBarraNuevo = $objProducto -> getCodigoBarra() ;

                        if($codigoBarra == $codigoBarraNuevo) {
                            $incorpora = false ; 
                            // Como identificar que producto agregar a importados o regionales 
                            // hacer una sola coleccion para los prodcutos 
                        }
                    $i++ ;
                }
                if($incorpora) {
                    // si descuento es > a 0 es regional 
                    array_push($coleccProducRegio, $objProducto) ;
                    $this -> setColeccProducRegio($coleccProducRegio) ;
                }
            return $incorpora ;
        }

        public function retornarImporteProducto($codProducto) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $i = 0 ;
            $j = 1 ; 
            
                while($codProducto <> $coleccProductos[$i] -> getCodigoBarra() && $j < count($coleccProductos)) {
                    $i++ ;
                    $j++ ;
                    if($codProducto == $coleccProductos[$i] -> getCodigoBarra()) {
                    }
                }
                if($codProducto == $coleccProductos[$i] -> getCodigoBarra()) {
                    $precioVenta = $coleccProductos[$i] -> getPrecioCompra() ;
                } else {
                    $precioVenta = -1 ;
                }
            return $precioVenta ;
        }

        public function retornarCostoProductoLocal() {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $sumaCostos = 0 ;

                foreach($coleccProductos as $producto ) {
                    $sumaCostos = $sumaCostos + ($producto -> getPrecioCompra() * $producto -> getStock()) ;
                }
            return $sumaCostos ;
        }

        public function productoMasEcomomico($rubroParam) {
            // comparo la descripcion del rubro con la del producto 
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $precioMasBarato = 99999999999 ; 
            $precio = 0 ;

                foreach($coleccProductos as $producto) {
                    // Obtener el objeto Rubro del producto 
                    $rubro = $producto -> getRubro();
                
                    // Acceder al dato "conservas" del objeto Rubro
                    $descripcion = $rubro -> getdescripcion();

                        // comparo el rubro de la coleccion con el que entra por parametro
                        if($rubroParam -> getDescripcion() == $descripcion) {
                            if($descripcion == "conservas") {
                                $precio = $producto -> getPrecioCompra() - ($producto -> getPrecioCompra() * 0.35) ;
                                // echo $precio . "\n";
                                    if($precio < $precioMasBarato) {
                                        $precioMasBarato = $precio ;
                                        $productoMasBarato = $producto -> getDescripcion() ;
                                    }
                            } else {
                                $precio = $producto -> getPrecioCompra() - ($producto -> getPrecioCompra() * 0.55) ;
                                    if($precio < $precioMasBarato) {
                                        $precioMasBarato = $precio ;
                                        $productoMasBarato = $producto -> getDescripcion() ;
                                    }
                            
                            }              
                    }
                }
            return $productoMasBarato ;
        }

        public function informarProductosMasVendidos($anio, $n) {
            // return productos mas vendidos ;
        }
        public function promedioVentasImportados() {
            // return promedioVentas ;
        }
        public function informarConsumoCliente($tipoDoc,$numDoc) {
            $coleccVentas = $this -> getColeccVentas() ; 
            $listaProductos = "" ; 

                foreach($coleccVentas as $venta) {
                    $cliente = $venta -> getCliente() ; 
                        if($cliente -> getTipoDoc() == $tipoDoc && $cliente -> getNroDoc() == $numDoc) {
                            $producto = $venta -> getProducto() ; 
                            $listaProductos = $listaProductos . 
                            "Producto: " . $producto -> getDescripcion() ;  
                        }
                }
            return $listaProductos ;
        }

        // es mejor si me pasan el objeto por parametro no? digo yo 
        // esta funcion consufa por lo del precio venta // precio compra del producto
        public function darPrecioVenta($objProducto) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $encontro = false ;
            $precioVenta = 0 ;

                // productos importados
                foreach($coleccProducImpor as $producto) {
                    if($producto -> getCodigoBarra() == $objProducto -> getCodigoBarra()) {
                        $precioCompra = $producto -> getPrecioCompra() ;
                        $rubro = $producto -> getRubro() ; 
                        $rubro = $rubro -> getPorcenGananApli() / 100 ;
                        $precioVenta = $precioVenta + ($precioCompra * $rubro) ; 
                        $iva = $producto -> getPorcenIva() ; 
                            if($iva > 0 && $iva < 9) {
                                $iva = $producto -> getPorcenIva() / 10 ; 
                            } else{
                                $iva = $producto -> getPorcenIva() / 100 ;
                            }
                        $precioVenta = $precioVenta + ($precioCompra * $iva) ; 

                        $impuestos = ($precioVenta * 0.50) ;
                        $precioVenta = $precioVenta + $impuestos ; 
                        $precioVenta = $precioVenta + ($precioVenta * 0.10) ;
                        $encontro = true ;
                    }
                }

                // productos regionales
                if($encontro <> true) {
                    foreach($coleccProducRegio as $producto) {
                        if($producto -> getCodigoBarra() == $objProducto -> getCodigoBarra()) {
                            $precioCompra = $producto -> getPrecioCompra() ;
                            $rubro = $producto -> getRubro() ; 
                            $rubro = $rubro -> getPorcenGananApli() / 100 ;
                            $precioVenta = $precioVenta + ($precioCompra * $rubro) ; 
                            $iva = $producto -> getPorcenIva() ; 
                                if($iva > 0 && $iva < 9) {
                                    $iva = $iva / 10 ; 
                                } else{
                                    $iva = $iva / 100 ;
                                }
                                $precioVenta = $precioVenta + ($precioCompra * $iva) ;  

                                // preguntar esto 
                                // ejecutar para ver precio al final queda mayor
                                $descuento = $producto -> getPorcenDescuento() ;
                                if($descuento > 0 && $descuento < 9) {
                                    $descuento = $descuento / 10 ; 
                                } else{
                                    $descuento = $descuento / 100 ;
                                }
                                $precioVenta = $precioVenta - ($precioVenta * $descuento) ;
                        }
                    }
                }   
            return $precioVenta ;
        }
        
        public function mostrarProducImpor() {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $cadenaColeccProducImpor = "" ; 

                foreach($coleccProducImpor as $producto) {
                    $cadenaColeccProducImpor = $cadenaColeccProducImpor . "\n" .
                        "Codigo de barras: " . $producto -> getCodigoBarra() . "\n" . 
                        "Descripcion: " . $producto -> getDescripcion() . "\n" . 
                        "Cantidad de stock: " . $producto -> getStock() . "\n" . 
                        "Porcentaje de iva: " . $producto -> getPorcenIva() . "%" . "\n" . 
                        "Precio de compra: " . $producto -> getPrecioCompra() . "\n" . 
                        "Rubro: " . "\n" . 
                        $producto -> getRubro() . "\n" ;
                }
            return $cadenaColeccProducImpor ; 
        }

        public function mostrarProducRegio() {
            $coleccProducRegio = $this -> getColeccProducRegio() ; 
            $cadenaColeccProducRegio = "" ; 

                foreach($coleccProducRegio as $producto) {
                    $cadenaColeccProducRegio = $cadenaColeccProducRegio . "\n" .
                        "Codigo de barras: " . $producto -> getCodigoBarra() . "\n" . 
                        "Descripcion: " . $producto -> getDescripcion() . "\n" . 
                        "Cantidad de stock: " . $producto -> getStock() . "\n" . 
                        "Porcentaje de iva: " . $producto -> getPorcenIva() . "%" . "\n" . 
                        "Precio de compra: " . $producto -> getPrecioCompra() . "\n" . 
                        "Rubro: " . "\n" . 
                        $producto -> getRubro() . "\n" ;
                }
            return $cadenaColeccProducRegio ; 
        }

        public function mostrarVentas() {
            $coleccVentas = $this -> getColeccVentas() ; 
            // print_r($coleccVentas) ;
            $cadenaColeccVentas = "" ; 
                foreach($coleccVentas as $venta) {
                    $cadenaColeccVentas = $cadenaColeccVentas . "\n" .
                        "Fecha: " . $venta -> getFecha() . "\n" . 
                        "Producto: " . "\n" .
                        $venta -> getRefProducto() .
                        "Cliente: " . $venta -> getClienteVenta() . "\n" ;
                }
            return $cadenaColeccVentas ; 
        }

        public function __toString() {
            $cadenaColeccProducImpor = $this -> mostrarProducImpor() ;
            $cadenaColeccProducRegio = $this -> mostrarProducRegio() ;
            $cadenaColeccVentas = $this -> mostrarVentas() ;
            return "\n" . 
            "Coleccion de Productos importados: " . $cadenaColeccProducImpor . "\n" . 
            "Coleccion de productos regionales: " . $cadenaColeccProducRegio . "\n" . 
            "Coleccion de ventas:  " . "\n" . $cadenaColeccVentas . "\n" ;
        }
    }