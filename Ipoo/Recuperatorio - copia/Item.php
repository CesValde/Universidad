<?php

    class Item {
        private $cantidadVendida;
        private $objProducto;

        public function __construct($cantidadVendida, $objProducto) {
            $this->cantidadVendida = $cantidadVendida;
            $this->objProducto = $objProducto;
        }

        public function getCantidadVendida() {
            return $this->cantidadVendida;
        }

        public function getProducto() {
            return $this->objProducto;
        }

        public function setCantidadVendida($cantidadVendida) {
            $this->cantidadVendida = $cantidadVendida;
        }

        public function setProducto($producto) {
            $this->objProducto = $producto;
        }

        public function __toString() {
            return "Cantidad vendida: " . $this->getCantidadVendida() . "\n" .
                "Producto: " . $this->getProducto() ;
        }
    }   