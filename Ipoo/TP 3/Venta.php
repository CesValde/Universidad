<?php 

    class Venta {
        private $fecha ; 
        private $producto ;         // objeto producto 
        private $cantProductos ;
        private $cliente ;          // objeto cliente

        public function __construct(
            $fecha , 
            $producto, 
            $cantProductos, 
            $cliente
        ) { 
            $this -> fecha = $fecha ;                 
            $this -> producto = $producto ;             
            $this -> cantProductos = $cantProductos ;          
            $this -> cliente = $cliente ; 
        }

        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getProducto() {
            return $this -> producto ; 
        }
        public function getCantidadProductos() {
            return $this -> cantProductos ; 
        }
        public function getClienteVenta() {
            return $this -> cliente ; 
        }

        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setProducto($refproducto) {
            $this -> producto = $refproducto ;   
        }
        public function setCantidadProductos($cantProductos) {
            $this -> cantProductos = $cantProductos ; 
        }
        public function setClienteVenta($cliente) {
            $this -> cliente = $cliente ; 
        }

        /* 
            El importe final de una venta normal se calcula en base a la cantidad de productos, por el
            importe del producto.
            Retorna el valor que debe ser abonado por el cliente
        */
        public function darImporteVenta() {
            $cantProductos = $this -> getCantidadProductos() ;
            $producto = $this -> getProducto() ;
            $precioProducto = $producto -> darPrecioVenta() ;

            $precioVenta = $precioProducto * $cantProductos ;
            return $precioVenta ;
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "Referencia del producto: " . $this -> getProducto() . "\n" . 
            "Cantidad de productos: " . $this -> getCantidadProductos() . "\n" .
            "Cliente: " . $this -> getClienteVenta() . "\n" ;
        }
    }