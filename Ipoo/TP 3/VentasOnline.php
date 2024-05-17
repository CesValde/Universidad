<?php 

    class VentaOnline extends Venta2 {
        private $porcenDescuento ;

        public function __construct(
            $fecha, 
            $paqueteTuristico, 
            $cantPersonas, 
            $cliente,
            $porcenDescuento 
        ) {
            parent::__construct(
                $fecha , 
                $paqueteTuristico, 
                $cantPersonas, 
                $cliente
            ) ;
            $this -> porcenDescuento = $porcenDescuento ;
        }

        public function getPorcenDescuento() {
            return $this -> porcenDescuento ;
        }

        public function setPorcenDescuento() {
            return $this -> porcenDescuento ;
        }

        /* 
            El importe final de una venta normal se calcula en base a la cantidad de días, por el importe del 
            día del paquete, por la cantidad de personas de la venta
            Se aplica el descuento por ser online
        */
        public function darImporteVenta() {
            $porcenDescuento = $this -> getPorcenDescuento() ;
            $importeVenta = parent::darImporteVenta() ;

            $importeVenta = $importeVenta - (($importeVenta * $porcenDescuento) / 100) ;
            return $importeVenta ;
        }

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena . 
                "Porcentaje de descuento: " . $this -> getPorcenDescuento() . "%" . "\n" ; 
        }
        
    }