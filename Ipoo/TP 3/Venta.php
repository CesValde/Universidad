<?php 

    class Venta {
        private $fecha ; 
        private $producto ;          // objeto producto 
        // private $cantProductos ;     // coleccion de ventas // no hacer 
        private $cliente ;              // objeto cliente

        public function __construct(
            $fecha , 
            $producto, 
            //$cantProductos, 
            $cliente
        ) { 
            $this -> fecha = $fecha ;                 
            $this -> producto = $producto ;             
            // $this -> cantProductos = $cantProductos ;          
            $this -> cliente = $cliente ; 
        }

        public function getFecha() {
            return $this -> fecha ; 
        }
        public function getRefProducto() {
            return $this -> producto ; 
        }
        /*
        public function getCantidadProductos() {
            return $this -> cantProductos ; 
        }
        */
        public function getClienteVenta() {
            return $this -> cliente ; 
        }

        public function setFecha($fecha) {
            $this -> fecha = $fecha ; 
        }
        public function setRefeProducto($refproducto) {
            $this -> producto = $refproducto ;   
        }
        /*
        public function setCantidadProductos($cantProductos) {
            $this -> cantProductos = $cantProductos ; 
        }
        */
        public function setClienteVenta($cliente) {
            $this -> cliente = $cliente ; 
        }
       
        public function __toString() {
            return "\n" . 
            "Fecha: " . $this -> getFecha() . "\n" . 
            "Referencia del producto: " . $this -> getRefProducto() . "\n" . 
            // "Cantidad de productos: " . $this -> getCantidadProductos() . "\n" .
            "Cliente: " . $this -> getClienteVenta() . "\n" ;
        }
    }