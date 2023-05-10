<?php 

    include_once "Producto.php" ;

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

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena ; 
        }
    }