<?php 

    class Producto {
        private $codigoBarra ;
        private $descripcion ; 
        private $stock ; 
        private $porcenIva ; 
        private $precioCompra ;
        private $rubro ;         // objeto rubro

        public function __construct(
            $codigoBarra, 
            $descripcion, 
            $stock, 
            $porcenIva,
            $precioCompra, 
            $rubro
        ) {
            $this -> codigoBarra = $codigoBarra ; 
            $this -> descripcion = $descripcion ;  
            $this -> stock = $stock ;  
            $this -> porcenIva = $porcenIva ;  
            $this -> precioCompra = $precioCompra ;  
            $this -> rubro = $rubro ;  
        }

        public function getCodigoBarra() {
            return $this -> codigoBarra ; 
        }
        public function getDescripcion() {
            return $this -> descripcion ; 
        }
        public function getStock() {
            return $this -> stock ; 
        }
        public function getPorcenIva() {
            return $this -> porcenIva ;
        }
        public function getPrecioCompra() {
            return $this -> precioCompra ; 
        }
        public function getRubro() {
            return $this -> rubro ; 
        }

        public function setCodigoBarra($codigoBarra) {
            $this -> codigoBarra = $codigoBarra ; 
        }
        public function setDescripcion($descripcion) {
            $this -> descripcion = $descripcion ;   
        }
        public function setStock($stock) {
            $this -> stock = $stock ; 
        }
        public function setPorcenIva($porcenIva) {
            $this -> porcenIva = $porcenIva ; 
        }
        public function setPrecioCompra($precioCompra) {
            $this -> precioCompra = $precioCompra ; 
        }
        public function setRubro($rubro) {
            $this -> rubro = $rubro ; 
        }
        
        public function __toString() {
            return 
            "Codigo de barra: " . $this -> getCodigoBarra() . "\n" . 
            "Descripcion: " . $this -> getDescripcion() . "\n" . 
            "Stock: " . $this -> getStock() . "\n" . 
            "Porcentaje Iva: " . $this -> getPorcenIva() . "\n" . 
            "Precio de Compra: " . $this -> getPrecioCompra() . "\n" . 
            "Rubro: " . $this -> getRubro() . "\n" . "\n" ;
        }
    }