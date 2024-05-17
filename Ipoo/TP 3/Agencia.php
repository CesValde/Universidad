<?php 

    class Agencia {
        private $coleccPaquetesTuris ; 
        private $coleccVentas ; 
        private $coleccVentasOnline ;

        public function __construct(
            $coleccPaquetesTuris, 
            $coleccVentas, 
            $coleccVentasOnline
        ) {
            $this -> coleccPaquetesTuris = $coleccPaquetesTuris ;
            $this -> coleccVentas = $coleccVentas ;
            $this -> coleccVentasOnline = $coleccVentasOnline ;
        }

        public function getColeccPaquetesTuris() {
            return $this -> coleccPaquetesTuris ; 
        }
        public function getColeccVentas() {
            return $this -> coleccVentas ; 
        }
        public function getColeccVentasOnline() {
            return $this -> coleccVentasOnline ; 
        }

        public function setColeccPaquetesTuris($coleccPaquetesTuris) {
            $this -> coleccPaquetesTuris = $coleccPaquetesTuris ;  
        }
        public function setColeccVentas($coleccVentas) {
            $this -> coleccVentas = $coleccVentas ;   
        }
        public function setColeccVentasOnline($coleccVentasOnline) {
            $this -> coleccVentasOnline = $coleccVentasOnline ; 
        }

        /* 
            incorpora a la colección de paquetes turísticos un nuevo paquete a la agencia siempre y cuando no 
            haya un paquete en la misma fecha al mismo destino. Si el paquete pudo ser ingresado el método debe 
            retornar true y false en caso contrario
        */
        public function incorporarPaquete($objPaqueteTuristico) {
            $coleccPaquetesTuris = $this -> getColeccPaquetesTuris() ;
            $incorpora = true ;
            $i = 0 ;

            while($incorpora == true && $i < count($coleccPaquetesTuris)) {
                $fecha = strtotime($coleccPaquetesTuris[$i] -> getFechaDesde()) ;
                $destino = $coleccPaquetesTuris[$i] -> getDestino() ;
                $fechaObj = strtotime($objPaqueteTuristico -> getFechaDesde()) ;
                $destinoObj = $objPaqueteTuristico -> getDestino() ;
                    if($fecha == $fechaObj && $destino == $destinoObj) {
                        $incorpora = false ;
                    }
            }
            if($incorpora) {
                $coleccPaquetesTuris[] = $objPaqueteTuristico ;
                $this -> setColeccPaquetesTuris($coleccPaquetesTuris) ;
            }
            return $incorpora ;
        }

        /* 
            retorna el importe final que debe ser abanado en caso que la venta pudo concretarse con éxito y -1 en 
            caso contrario.
        */
        public function incorporarVenta($objPaquete, $tipoDoc, $numDoc, $cantPer, $esOnLine) {
            $coleccVentas = $this -> getColeccVentas() ;
            $coleccVentasOnline = $this -> getColeccVentasOnline() ;
            $cantTotalPlazas = $objPaquete -> getCantTotalPlazas() ;
            $importeFinal = -1 ;

            if($cantPer < $cantTotalPlazas) {
                $fecha = date("Y-m-d H:i:s") ;
                $cliente = new Cliente2($tipoDoc, "Cesar", "Valderrama", $numDoc) ;
                if($esOnLine) {
                    $venta = new VentaOnline($fecha, $objPaquete, $cantPer, $cliente, 20) ; 
                    $coleccVentasOnline[] = $venta ;
                    $this -> setColeccVentasOnline($coleccVentasOnline) ;  
                } else {
                    $venta = new Venta2($fecha, $objPaquete, $cantPer, $cliente) ;
                }
                $importeFinal = $venta -> darImporteVenta() ;
                $coleccVentas[] = $venta ;
                $this -> setColeccVentas($coleccVentas) ;
            }
            return $importeFinal ;
        }

        /* 
         retorna una colección con todos los paquetes que se realizan en una fecha y a un destino
        */
        public function informarPaquetesTuristicos($fecha, $destino) {
            $coleccPaquetesTuris = $this -> getColeccPaquetesTuris() ;
            $fecha = strtotime($fecha) ;

            foreach($coleccPaquetesTuris as $paquete) {
                $fechaPaq = strtotime($paquete -> getFecha()) ;
                $destinoPaq = $paquete -> getDestino() ;
                    if($fechaPaq == $fecha && $destinoPaq == $destino) {
                        $coleccPaquetes[] = $paquete ;
                    }
            }
            return $coleccPaquetes ;
        }

        /* 
            verificar esto junto a su clase paquetes turisticos
            retorna el paquete turístico mas económico para una fecha y un destino
        */
        public function paqueteMasEcomomico($fecha, $destino) {
            $coleccPaquetesTuris = $this -> informarPaquetesTuristicos($fecha, $destino) ;
            $fecha = strtotime($fecha) ;
            $paqueteMasEconomico = null ;
            $valorMasBajo = 999999999999999999 ;

            foreach($coleccPaquetesTuris as $paquete) {
                $importeFinal = $paquete -> darImporteVenta() ;
                if($importeFinal < $valorMasBajo) {
                    $valorMasBajo = $importeFinal ;
                    $paqueteMasEconomico = $paquete ;
                }
            }
            return $paqueteMasEconomico ;
        }

        /* 
            retorna todos los paquetes que fueron utilizados por la persona identificada con el tipoDoc y numDoc 
            recibidos por parámetro
        */
        public function informarConsumoCliente($tipoDoc, $numDoc) {
            $coleccVentas = $this -> getColeccVentas() ;
            $coleccPaquetesUsados = [] ;

            foreach($coleccVentas as $venta) {
                if($tipoDoc == $venta -> getClienteVenta() -> getTipoDoc() && $numDoc == $venta -> getClienteVenta() -> getNroDoc()) {
                    $paquete = $venta -> getPaquete ;
                    $coleccPaquetesUsados[] = $paquete ;
                }
            }
            return $coleccPaquetesUsados ;
        }

        /* 
            retorna los n paquetes turísticos mas vendido en el año recibido por parámetro.
            $coleccPaqueteMasVendidos = [
                "paquete" => objeto, 
                "cantVendidos => 30
            ]
        */
        public function informarPaquetesMasVendido($anio, $n) {
            $coleccVentas = $this -> getColeccVentas() ;
            $coleccPaquetesMasVendidos = [] ;
            $anio = intval($anio) ;
                
            foreach($coleccVentas as $venta) {
                $anioColecc = $venta->getFecha() ;
                // anioColecc = 2024 
                $anioColecc = date("Y", strtotime($anioColecc)) ;   
                if($anio == $anioColecc) {
                    $paquete = $venta -> getPaquete() ;
                    $destino = $paquete -> getDestino() ;
                    $destino = $destino -> getNombreLugar() ;

                    // array_key_exists usa el destino para encontrar el objeto almacenado en el array
                    if(array_key_exists($destino, $coleccPaquetesMasVendidos)) {
                        $coleccPaquetesMasVendidos[$destino]["cantVendidos"]++  ;
                    } else {
                        // Agrega el producto al array si no se encuentra
                        $coleccPaquetesMasVendidos[$destino] = [
                            "paquete" => $paquete,
                            "cantVendidos" => 1
                        ];
                    }
                }
            }

            // Ordenar los paquetes por cantidad vendida en orden descendente
            usort($coleccPaquetesMasVendidos, function ($a, $b) {
                return $b["cantVendidos"] - $a["cantVendidos"];
            });

            // Tomar los primeros $n paquetes más vendidos
            $coleccPaquetesMasVendidos = array_slice($coleccPaquetesMasVendidos, 0, $n);
            return $coleccPaquetesMasVendidos ;
        }

        /* 
            retorna el promedio de ventas on-line realizadas por la agencia.
        */
        public function promedioVentasOnLine() {
            $coleccVentas = $this -> getColeccVentas() ;
            $promedioVentasOnline = 0 ;
            $sumaCostos = 0 ;
            $cantVentasOnline = 0 ;

            foreach($coleccVentas as $venta) {
                if($venta instanceof VentaOnline) {
                    $sumaCostos += $venta -> darImporteVenta() ;
                    $cantVentasOnline++ ;
                }
            }

            if($cantVentasOnline > 0) {
                $promedioVentasOnline = $sumaCostos / $cantVentasOnline ;
            } 
            return $promedioVentasOnline ;
        }

        /*
            retorna el promedio de ventas realizadas por la agencia.
        */
        public function promedioVentasAgencia() {
            $coleccVentas = $this -> getColeccVentas() ;
            $promedioVentas = 0 ;
            $sumaCostos = 0 ;
            $cantVentas = 0 ;

            foreach($coleccVentas as $venta) {
                $sumaCostos += $venta -> darImporteVenta() ;
                $cantVentas++ ;
            }

            if($cantVentas > 0) {
                $promedioVentas = $sumaCostos / $cantVentas ;
            } 
            return $promedioVentas ;
        }

        public function mostrarPaquetes() {
            $coleccPaquetesTuris = $this -> getColeccPaquetesTuris() ;
            $cadenaPaquetesTuris = "" ;
            foreach($coleccPaquetesTuris as $paquete) {
                $cadenaPaquetesTuris .= $paquete->__toString() . "\n";
            }
            return $cadenaPaquetesTuris ;
        }

        public function mostrarVentas() {
            $coleccVentas = $this -> getColeccVentas() ;
            $cadenaVentas = "" ;
            foreach($coleccVentas as $venta) {
                $cadenaVentas .= $venta->__toString() . "\n";
            }
            return $cadenaVentas ;
        }

        public function mostrarVentasOnline() {
            $coleccVentasOnline = $this -> getColeccVentasOnline() ;
            $cadenaVentasOnline = "" ;
            foreach($coleccVentasOnline as $ventaOnline) {
                $cadenaVentasOnline .= $ventaOnline->__toString() . "\n";
            }
            return $cadenaVentasOnline ;
        }
        
        public function __toString() {
            $cadenaPaquetesTuris = $this -> mostrarPaquetes() ;
            $cadenaVentas = $this -> mostrarVentas() ;
            $cadenaVentasOnline = $this -> mostrarVentasOnline() ;
            return "\n" . 
                "INFORMACION DE LA AGENCIA: " . "\n" .
                "PAQUETES TURISTICOS: " . $cadenaPaquetesTuris .
                "VENTAS: " . $cadenaVentas . 
                "VENTAS ONLINE: " . $cadenaVentasOnline ; 

        }
    }