<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $coleccPasajeros ;  
        private $responsableV ; 
        

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            // coleccion de objetos, los objetos son pasajeros 
            $coleccPasajeros, 
            $responsableV
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> coleccPasajeros = $coleccPasajeros ; 
            $this -> responsableV = $responsableV ;
        }

        // obetener los datos 
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

        // asignamos los valores 
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

            for($i=0 ; $i<count($coleccPasajeros) ; $i++) {
                $nombrePasaj = $coleccPasajeros[$i] -> getNombrePasajero() ;
                $apellidoPasaj = $coleccPasajeros[$i] -> getApellidoPasajero() ;
                $nroDocPasaj = $coleccPasajeros[$i] -> getNroDocPasajero() ;
                $nroTelPasaj = $coleccPasajeros[$i] -> getNroTelefPasajero() ;
                $cadena = $cadena . "Nombre: " . $nombrePasaj . "\n" . 
                    "Apellido: " . $apellidoPasaj . "\n" .  
                    "Nro de documento: " . $nroDocPasaj . "\n" .  
                    "Nro de Telefono: " . $nroTelPasaj . "\n" . "\n" ;
            }    
            return $cadena ; 
        }   
        
        public function __toString() {
            $cadena = $this -> datosPasajeros() ; 
            return "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "\n" . 
                "Datos del responsable: " . $this -> getResponsableV() . "\n" .
                "Datos de los pasajeros: " . "\n" . "\n" . $cadena ; 
        }
    }