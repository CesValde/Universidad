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
                        }
                    $i++ ;
                }
                if($incorpora) {
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
            // return sumaCostos ;
        }

        // es mejor si me pasan el objeto por parametro no? digo yo 
        // esta funcion consufa por lo del precio venta // precio compra del producto
        public function darPrecioVenta($objProducto) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $encontro = false ;
            $precioVenta = 0 ;

            /* 
                Hacer precio de venta de los productos. 'El precio de venta de un producto se calcula 
                sobre el precio de compra, más el porcentaje de ganancia en basea su rubro, más el 
                porcentaje de IVA que se aplica al producto' . 
            */
            // duda de si hacerlo aca 


                    // productos importados
                    foreach($coleccProducImpor as $producto) {
                        if($producto -> getCodigoBarra() == $objProducto -> getCodigoBarra()) {
                            $precioVenta = $producto -> getPrecioCompra() ;
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
                                $rubro = $producto -> getRubro() ;
                                $descuento = $rubro -> getporcenGananApli() ;
                                $descuento = $descuento / 100 ;
                                // agrega el porcentaje de ganancia aplicado al producto 
                                // esta en la clase producto objeto rubro 
                                $precioVenta = $producto -> getPrecioCompra() ;   // contradictorio
                                $descuento = $precioVenta * $descuento ;
                                $precioVenta = $precioVenta - $descuento ;  // se aplica el descuento
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