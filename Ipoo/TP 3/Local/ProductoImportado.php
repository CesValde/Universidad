<?php 

    class ProductoImportado extends Producto {
        public function __construct(
            $codigoBarra, 
            $descripcion, 
            $stock, 
            $porcenIva,
            $precioCompra, 
            $rubro
        ) {
            parent:: __construct(
                $codigoBarra, 
                $descripcion, 
                $stock, 
                $porcenIva,
                $precioCompra, 
                $rubro
            ) ; 
        }

        public function darPrecioVenta() {
            $precioVenta = parent::darPrecioVenta() ;

            $precioVenta = ($precioVenta + ($precioVenta * 0.50)) + ($precioVenta * 0.10) ; 
            return $precioVenta ;
        }

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena ; 
        }
    }