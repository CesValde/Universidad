<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $coleccPasajeros ;  
        private $responsableV ; 
        private $precioTicket ;
        private $dineroTotal ; 

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            $coleccPasajeros,    // Los objetos son pasajeros 
            $responsableV, 
            $precioTicket, 
            $dineroTotal 
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> coleccPasajeros = $coleccPasajeros ; 
            $this -> responsableV = $responsableV ;
            $this -> precioTicket = $precioTicket ;
            $this -> dineroTotal = $dineroTotal ;
        }

        // get
        public function getCodigoViaje() {
            return $this -> codigoViaje ; 
        }
        public function getDestino() {
            return $this -> destino ; 
        }
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros ; 
        }
        public function getColeccPasajeros() {
            return $this -> coleccPasajeros ; 
        }
        public function getResponsableV() {
            return $this -> responsableV ; 
        }
        public function getPrecioTicket() {
            return $this -> precioTicket ; 
        }
        public function getDineroTotal() {
            return $this -> dineroTotal ; 
        }
        
        // set
        public function setCodigoViaje($codigoViaje) {
            $this -> codigoViaje = $codigoViaje ; 
        }
        public function setDestino($destino) {
            $this -> destino = $destino ;   
        }
        public function setCantMaxPasajeros($cantMaxPasajeros) {
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
        }
        public function setColeccPasajeros($coleccPasajeros) {
            $this -> coleccPasajeros = $coleccPasajeros ; 
        }
        public function setResponsableV($responsableV) {
            $this -> responsableV = $responsableV ; 
        }
        public function setPrecioTicket($precioTicket) {
            $this -> precioTicket = $precioTicket ; 
        }
        public function setDineroTotal($dineroTotal) {
            $this -> dineroTotal = $dineroTotal ; 
        }
 
        /**
         * Cambia el nombre del pasajero 
         * @param int $nroDocPasaj
         * @param string $nombre
         * @return boolean
         */
        public function cambiarNombre($nroDocPasaj, $nombre) {
            // array $pasajeros
            // boolean $existe
            // int $j

            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $existe = false ;
            $j = 0 ;
                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) {
                        $coleccPasajeros[$j] -> setNombrePasajero($nombre) ; 
                        $this -> setColeccPasajeros($coleccPasajeros) ; 
                        $j = count($coleccPasajeros) ; 
                        $existe = true ; 
                    }
                    // print_r($coleccPasajeros) ;
                    $j++ ; 
                }
            return $existe ; 
        }

        /**
         * Cambia el apellido del pasajero 
         * @param int $nroDocPasaj
         * @param string $apellido
         * @return boolean
         */
        public function cambiarApellido($nroDocPasaj, $apellido) {
            // array $pasajeros
            // boolean $existe
            // int $j 

            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $existe = false ;
            $j = 0 ;
                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) {
                        $coleccPasajeros[$j] -> setApellidoPasajero($apellido) ; 
                        $this -> setColeccPasajeros($coleccPasajeros) ; 
                        $j = count($coleccPasajeros) ; 
                        $existe = true ; 
                    }
                    $j++ ; 
                }
            return $existe ;
        }

        /**
         * Cambia el nro de documento del pasajero 
         * @param int $nroDocPasaj
         * @param string $nombre
         * @param string $apellido
         * @return boolean
         */
        public function cambiarDni($nroDocPasaj, $nombre, $apellido) {
            // array $pasajeros
            // boolean
            // int $j 

            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $existe = false ; 
            $j = 0 ; 

                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) {
                        if($nombre == $coleccPasajeros[$j] -> getNombrePasajero()) {
                            if($apellido == $coleccPasajeros[$j] -> getApellidoPasajero()) {
                                $coleccPasajeros[$j] -> setApellidoPasajero($apellido) ; 
                                $this -> setColeccPasajeros($coleccPasajeros) ; 
                                $j = count($coleccPasajeros) ; 
                                $existe = true ;
                            }
                        }                  
                    }
                    // print_r($pasajeros) ;
                    $j++ ; 
                } 
            return $existe ; 
        }

        /**
         * Cambia el nro de documento del pasajero 
         * @param int $nroDocPasaj
         * @param string $nombre
         * @param string $apellido
         * @return boolean
         */
        public function cambiarTelefono($nroDocPasaj, $nroTelPasaj) {
            // array $pasajeros
            // boolean
            // int $j 

            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $existe = false ; 
            $j = 0 ; 
                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) {
                        $coleccPasajeros[$j] -> setNroTelefPasajero($nroTelPasaj) ; 
                        $this -> setColeccPasajeros($coleccPasajeros) ; 
                        $j = count($coleccPasajeros) ; 
                        $existe = true ; 
                    }
                    $j++ ; 
                } 
            return $existe ;
        }


        /**
         * Verifica que el pasajero ya exista en la coleccion
         * @param string $nombre
         * @param string $apellido
         * @param string $nroDocPasaj
         * @return boolean 
         */
        public function existePasajero($nombre, $apellido, $nroDocPasaj) {
            // array $coleccPasajeros
            // boolean #existPasaj
            // int $j

            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $existPasaj = false ;
            $j = 0 ; 

                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) {
                        if($nombre == $coleccPasajeros[$j] -> getNombrePasajero()) {
                            if($apellido == $coleccPasajeros[$j] -> getApellidoPasajero()) {
                                $j = count($coleccPasajeros) ; 
                                $existPasaj = true ;
                            }
                        }                  
                    }
                    // print_r($pasajeros) ;
                    $j++ ; 
                }
            return $existPasaj ; 
        }

        /**
         * ELimina un pasajero de el viaje
         * @param int $nroDocPasaj 
         * @return boolean
         */
        public function eliminarPasajero($nroDocPasaj) {
            // array $pasajeros
            // boolean $eliminado
            // int $j 

            $j=0 ; 
            $eliminado = false ; 
            $coleccPasajeros = $this -> getColeccPasajeros() ; 
                while($j<count($coleccPasajeros)) {
                    if($nroDocPasaj == $coleccPasajeros[$j] -> getNroDocPasajero()) { 
                         /* array_splice elimina de $pasajeros $desde la posicion $j '1 elemento' */                  
                        array_splice($coleccPasajeros, $j, 1) ; 
                        $eliminado = true ;
                        $this -> setColeccPasajeros($coleccPasajeros) ; 
                        // print_r($coleccPasajeros) ;
                    }
                    $j++ ; 
                }
            return $eliminado ; 
        } 
        
        /**
         * Vende un pasaje si hay asientos disponibles retorna el importe a pagar por el pasajero
         * @param object $pasajero
         * @return int
         */
        public function venderPasaje($pasajero) {
            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $cantPasajeros = count($coleccPasajeros) ; 
            $importe = 0 ;
            $descuento = $pasajero -> darPorcentajeIncremento() ;
            // echo $cantPasajeros . "\n" ;

            $disponible = $this -> hayPasajeDisponible($cantPasajeros) ;
                if($disponible) {              
                    $precioTicket = $this -> getPrecioTicket() ;
                    $cantPasajeros++ ;  
                    $importe = $precioTicket + ($precioTicket * $descuento) ; 
                    array_push($coleccPasajeros, $pasajero) ;
                    $this -> setColeccPasajeros($coleccPasajeros) ;
                   /*  $dineroTotal .= $importe ;
                    setDineroTotal($dineroTotal) ; */
                } else {
                    $importe = -1 ;
                }
            return $importe ; 
        }

        /**
         * Retorna un booelano para determinar si hay pasajes disponibles 
         * @param int $cantPasajeros
         * @return boolean 
         */
        public function hayPasajeDisponible($cantPasajeros) {
            $cantMaxPasajeros = $this -> getCantMaxPasajeros() ; 
            $disponible = false ;

                if($cantPasajeros < $cantMaxPasajeros) {
                    $disponible = true ;
                }
            return $disponible ;
        }

        
        /**
         * Retorna el costo total del viaje
         * @return int 
         */
        public function gastoTotalViaje() {
            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $dineroTotal = 0 ;

                foreach($coleccPasajeros as $pasajero) {
                    $descuento = $pasajero -> darPorcentajeIncremento() ;
                    $precioTicket = $this -> getPrecioTicket() ;
                    $dineroTotal = $dineroTotal + ($precioTicket + ($precioTicket * $descuento)) ; 
                    // echo $dineroTotal . "\n" ;
                }
                $this -> setDineroTotal($dineroTotal) ;

            return $dineroTotal ; 
        } 
        
        /**
         * Almacena en una cadena los datos de los pasajeros
         * @return array
         */
        public function datosPasajeros() {
            // string $cadena 
            // array $coleccPasajeros
            // string $nombrePasaj, $apellidoPasaj
            // int $nroDocPasaj, $nroTelPasaj

            $cadena = "" ; 
            $coleccPasajeros = $this -> getColeccPasajeros() ; 

            foreach($coleccPasajeros as $pasajero) {
                $cadena = $cadena . $pasajero ;
                // echo $cadena . "\n" ;
            }    
            return $cadena ; 
        }   
        
        public function __toString() {
            $cadena = $this -> datosPasajeros() ; 
            $dineroTotal = $this -> gastoTotalViaje() ;

            return "\n" .
                "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "Precio del ticket: " . $this -> getPrecioTicket() . "\n" . 
                "Dinero Total: " . $dineroTotal . "\n" . 
                "\n" . 
                "Datos del responsable: " . $this -> getResponsableV() . "\n" .
                "Datos de los pasajeros: " . "\n" . $cadena . "\n" ;
        }
    }