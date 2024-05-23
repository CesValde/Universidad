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

        /* 
            método que recibe por parámetro un objeto Producto y verifica que el código de barra no se 
            encuentre dentro de la lista. Si el producto ya existe no es incorporado dentro de la lista 
            de productos de la tienda. El método retorna verdadero o falso según corresponda.
        */
        public function incorporarProductoTienda($objProducto) {
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
                    }
                $i++ ;
            }

            if($incorpora) {
                if($objProducto instanceof ProductoImportado) {
                    $coleccProducImpor[] = $objProducto ;
                    $this -> setColeccProducImpor($coleccProducImpor) ;
                } else {
                    $coleccProducRegio[] = $objProducto ;
                    $this -> setColeccProducRegio($coleccProducRegio) ;
                }
            }
            return $incorpora ;
        }

        /* 
            recibe por parámetro el código de un producto y retorna el precio de venta.
        */
        public function retornarImporteProducto($codProducto) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $i = 0 ;
            $precioVenta = 0 ;
            
            while($precioVenta == 0 && $i < count($coleccProductos)) {
                $codigoBarra = $coleccProductos[$i] -> getCodigoBarra() ;
                if($codigoBarra == $codProducto) {
                    $precioVenta = $coleccProductos[$i] -> darPrecioVenta() ;
                }
                $i++ ;
            }
            return $precioVenta ;
        }

        /* 
            recorre todos los productos de la tienda y retorna la suma de los costos de cada producto 
            teniendo en cuenta el stock de cada uno
        */
        public function retornarCostoProductoTienda() {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $sumaCostos = 0 ;

            foreach($coleccProductos as $producto ) {
                $stock = $producto -> getStock() ;
                $precioVenta = $producto -> darPrecioVenta() ;
                $precioVenta = $precioVenta * $stock ;
                $sumaProductos = $sumaCostos + $precioVenta ;
            }
            return $sumaProductos ;
        }

        /* 
            retorna el producto más económico de un rubro
        */
        public function productoMasEcomomico($rubroParam) {
            $coleccProducImpor = $this -> getColeccProducImpor() ; 
            $coleccProducRegio = $this -> getColeccProducRegio() ;
            $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
            $precioMasBarato = 99999999999 ; 
            $precio = 0 ;

            foreach($coleccProductos as $producto) {
                $descripcion = $producto -> getRubro() ->getdescripcion() ;
                if($rubroParam -> getDescripcion() == $descripcion) {
                    $precio = $producto -> darPrecioVenta() ;
                    if($precio < $precioMasBarato) {
                        $precioMasBarato = $precio ;
                        $productoMasBarato = $producto ;
                    }        
                }
            }
            return $productoMasBarato ;
        }

        /* 
            retorna los n productos más vendidos en el año recibido por parámetro.
            $coleccProdMasVendidos = [
                "producto" => objeto, 
                "cantVendidos => 30
            ]
        */
        public function informarProductosMasVendidos($anio, $n) {
            $coleccVentas = $this -> getColeccVentas() ;
            $coleccProdMasVendidos = [] ;
            $anio = intval($anio) ;

            foreach($coleccVentas as $venta) {
                $anioColecc = $venta->getFecha() ;
                $anioColecc = date("Y") ;
                $anioColecc = intval($anioColecc) ;
                if($anio == $anioColecc) {
                    $producto = $venta -> getProducto() ;
                    $cantProductos = $venta -> getCantidadProductos() ;
                    $codigoBarra = $producto -> getCodigoBarra() ;
                    // array_key_exists usa el codigo de barra para encontrar el objeto almacenado en el array
                    if(array_key_exists($codigoBarra, $coleccProdMasVendidos)) {
                        $coleccProdMasVendidos[$codigoBarra]["cantVendidos"] += $cantProductos;
                    } else {
                        // Agrega el producto al array si no se encuentra
                        $coleccProdMasVendidos[$codigoBarra] = [
                            "producto" => $producto,
                            "cantVendidos" => $cantProductos
                        ];
                    }
                }
            }
            return $coleccProdMasVendidos ;
        }

        /* 
            retorna el promedio de ventas de productos importados realizadas.
        */
        public function promedioVentasImportados() {
            $coleccVentas = $this -> getColeccVentas() ;
            $promedioVentasImpor = 0 ;
            $sumaCostos = 0 ;
            $cantVentas = 0 ;

            foreach($coleccVentas as $venta) {
                $producto = $venta -> getProducto() ;
                if($producto instanceof ProductoImportado) {
                    $sumaCostos += $producto -> darPrecioVenta() ;
                    $cantVentas++ ;
                }
            }

            if($cantVentas > 0) {
                $promedioVentasImpor = $sumaCostos / $cantVentas ;
            } 
            return $promedioVentasImpor ;
        }

        /* 
            retorna todos los productos que fueron comprados por la persona identificada con el tipoDoc y 
            numDoc recibidos por parámetro
        */
        public function informarConsumoCliente($tipoDoc,$numDoc) {
            $coleccVentas = $this -> getColeccVentas() ; 
            $listaProductos = "" ; 

                foreach($coleccVentas as $venta) {
                    $cliente = $venta -> getClienteVenta() ; 
                        if($cliente -> getTipoDoc() == $tipoDoc && $cliente -> getNroDoc() == $numDoc) {
                            $producto = $venta -> getProducto() ; 
                            $listaProductos = $listaProductos . 
                            "PRODUCTO: " . "\n" . $producto . "\n" ;  
                        }
                }
            return $listaProductos ;
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
            $cadenaColeccVentas = "" ; 
                foreach($coleccVentas as $venta) {
                    $cadenaColeccVentas = $cadenaColeccVentas . "\n" .
                        "Fecha: " . $venta -> getFecha() . "\n" . 
                        "Producto: " . "\n" .
                        $venta -> getProducto() .
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