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

        public function darPrecioVenta() {
            $porcenDescuento = $this -> getPorcenDescuento() ;
            $precioVenta = parent::darPrecioVenta() ;

            $precioVenta = $precioVenta - (($precioVenta * $porcenDescuento) / 100) ; 
            return $precioVenta ;
        }

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena . "\n" . 
                "Porcentaje de descuento: " . $this -> getPorcenDescuento() . "%" ; 
        }
    }