<?php 

    class Tienda {
        private $nombre;
        private $direccion;
        private $telefono;
        private $coleccProductos;
        private $coleccVentas;

        public function __construct($nombre, $direccion, $telefono) {
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->coleccProductos = [];
            $this->coleccVentas = [];
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getDireccion() {
            return $this->direccion;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function getColeccProductos() {
            return $this->coleccProductos;
        }

        public function getColeccVentas() {
            return $this->coleccVentas;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        public function setColeccProductos($coleccProductos) {
            $this->coleccProductos = $coleccProductos;
        }
    
        public function setColeccVentas($coleccVentas) {
            $this->coleccVentas = $coleccVentas;
        }

        /* 
            dado un código de barra por parámetro, retorna la el subíndice donde se encuentra un 
            objeto producto con ese código de barra. En caso de no encontrar el código de barra 
            en la colección de productos retornar ?? 
        */
        public function buscarProducto($codigoBarra) {
            $coleccProductos = $this -> getColeccProductos() ;
            $subIndice = -1 ;
            $i = 0 ;

            while($subIndice == -1 && $i < count($coleccProductos)) {
                $producto = $coleccProductos[$i] ; 
                $codigo = $producto -> getCodigoBarra() ;
                    if($codigo == $codigoBarra) {
                        $subIndice = $i ;
                    }
                $i++ ;
            }
            return $subIndice ;
        }

        /* 
            recibe por parámetro con arreglos asociativos que contienen la siguiente información: 
            código barra correspondiente a un producto y cantidad de ejemplares del producto  que 
            desea venderse.  
            El procedimiento debe buscar los productos según el código de barra, verificar el stock 
            disponible y realizar el registro de la venta en caso de ser posible. 
            El procedimiento debe retornar un objeto Venta con los ítems correspondientes a aquellos 
            productos que se pudo vender.
        */
        /* 
            $arrayItems = [
                "codigoBarra => "eruf",
                "cantVender" => 22
            ]
        */
        public function realizarVenta($arrayItems) {
            $coleccProductos = $this -> getColeccProductos() ;
            $coleccVentas = $this -> getColeccVentas() ;
            $venta = null ;
            $i=0 ;

            while($venta == null && $i < count($coleccProductos)) {     // en el count poner $arrayItems..
                // $producto = $coleccProductos[$i] ;
                $codigoBarra = $arrayItems[$i]["codigoBarra"] ;
                $indice = $this -> buscarProducto($codigoBarra) ;
                    if($indice <> -1) {
                        $producto = $coleccProductos[$indice] ;
                        $cantDeseaVender = $arrayItems[$i]["cantVender"] ;      // 8
                        $date = new DateTime(); 
                        $dateString = $date->format('Y-m-d H:i:s'); 
                        $venta = new Venta($dateString, "Consumidor Final", count($this->getColeccVentas()) + 1, "C", []);
                        $venta -> incorporarProducto($producto, $cantDeseaVender) ;
                        $coleccVentas[] = $venta ;
                        $this -> setColeccVentas($coleccVentas) ;
                        $item = new Item($cantDeseaVender, $producto) ;
                        $coleccItems = $venta -> getColeccItems() ;
                        $coleccItems[] = $item ;
                        $venta -> setColeccItems($coleccItems) ;
                    }
            }
            return $venta ;
        } 

        public function mostrarProductos() {
            $coleccProductos = $this -> getColeccProductos() ;
            $cadenaProductos = "" ;
            foreach($coleccProductos as $producto) {
                $cadenaProductos .= $producto . "\n" ;
            }
            return $cadenaProductos ;
        }

        public function mostrarVentas() {
            $coleccVentas = $this -> getColeccVentas() ;
            $cadenaVentas = "" ;
            foreach ($coleccVentas as $venta) {
                $cadenaVentas .= $venta . "\n";
            }
            return $cadenaVentas ;
        }


        public function __toString() {
            $cadenaProductos = $this -> mostrarProductos() ;
            $cadenaVentas = $this -> mostrarVentas() ;
           
            return "Nombre de la tienda: " . $this->getNombre() . "\n" .
                "Dirección: " . $this->getDireccion() . "\n" .
                "Teléfono: " . $this->getTelefono() . "\n" .
                "Productos en la tienda:\n" . $cadenaProductos . "\n" .
                "Ventas realizadas:\n" . $cadenaVentas ;
        }
    }