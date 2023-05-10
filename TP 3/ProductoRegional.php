<?php 

    class ProductoRegional extends Producto {
        private $porcenDescuento ;

        public function __construct(
            $porcenDescuento,
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
                $rubro, 
            ) ; 
            $this -> porcenDescuento = $porcenDescuento ;
        }

        public function getPorcenDescuento() {
            return $this -> porcenDescuento ;
        }

        public function setPorcenDescuento() {
            return $this -> porcenDescuento ;
        }

        public function darImporteVenta() {
            $importeFinal = 0 ; 
            





            return $importeFinal ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena ; 
        }
    }