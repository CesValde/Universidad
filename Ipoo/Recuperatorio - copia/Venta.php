<?php 

    class Venta {
        private $fecha;
        private $cliente;
        private $numeroFactura;
        private $tipoComprobante;
        private $coleccItems;

        public function __construct($fecha, $cliente, $numeroFactura, $tipoComprobante, $coleccItems) {
            $this->fecha = $fecha;
            $this->cliente = $cliente;
            $this->numeroFactura = $numeroFactura;
            $this->tipoComprobante = $tipoComprobante;
            $this->coleccItems = $coleccItems;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function getCliente() {
            return $this->cliente;
        }

        public function getNumeroFactura() {
            return $this->numeroFactura;
        }

        public function getTipoComprobante() {
            return $this->tipoComprobante;
        }

        public function getColeccItems() {
            return $this->coleccItems;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }

        public function setCliente($cliente) {
            $this->cliente = $cliente;
        }

        public function setNumeroFactura($numeroFactura) {
            $this->numeroFactura = $numeroFactura;
        }

        public function setTipoComprobante($tipoComprobante) {
            $this->tipoComprobante = $tipoComprobante;
        }

        public function setColeccItems($coleccItems) {
            $this->coleccItems = $coleccItems;
        }


        /* 
            recibe por parámetro un producto y la cantidad que desea registrarse en la venta. Si 
            es posible realizar la venta, teniendo en cuenta la cantidad solicitada y la cantidad 
            en stock del producto, se crea un item y se incorpora a la colección de items de la venta.
            Recordar que debe actualizarse el stock del producto si la venta se realiza con éxito.
            El método debe retornar el objeto de productos modificado si se pudo realizar la venta 
            o null en caso contrario.
        */
        public function incorporarProducto($unObjProducto, $cantAVender) {     // 10
            $cantidadStock = $unObjProducto -> getCantidadEnStock() ;   // 20
            $coleccItems = $this -> getColeccItems() ;

                if($cantidadStock >= $cantAVender) {
                    $item = new Item($cantAVender, $unObjProducto) ;
                    $cantAVender = $cantAVender * -1 ;
                    $unObjProducto -> actualizarStock($cantAVender) ;
                    $coleccItems[] = $item ;
                    $this -> setColeccItems($coleccItems) ;
                } else {
                    $unObjProducto = null ;
                }
            return $unObjProducto ;
        }

        public function mostrarItems() {
            $coleccItems = $this -> getColeccItems() ;
            $cadenaItems = "" ;
            foreach ($coleccItems as $item) {
                $cadenaItems .= $item . "\n";
            }
            return $cadenaItems ;
        }

        public function __toString() {
            $cadenaItems = $this -> mostrarItems() ;
            return "Fecha: " . $this->getFecha() . "\n" .
                   "Cliente: " . $this->getCliente() . "\n" .
                   "Número de Factura: " . $this->getNumeroFactura() . "\n" .
                   "Tipo de Comprobante: " . $this->getTipoComprobante() . "\n" .
                   "Ítems vendidos:\n" . $cadenaItems;
        }
    }