<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $pasajeros ;  

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            $pasajeros 
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> pasajeros = $pasajeros ; 
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
        public function getPasajeros() {
            return $this -> pasajeros ; 
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
        public function setPasajeros($pasajeros) {
            $this -> pasajeros = $pasajeros ; 
        }

        /**
         * Cambia el nombre del pasajero 
         * @param int $dni
         * @param string $nombre
         * @return boolean
         */
        public function cambiarNombre($dni, $nombre) {
            // array $pasajeros
            // boolean $existe
            // int $j 

            $pasajeros = $this -> getpasajeros() ; 
            $existe = false ;
            $j = 0 ;
                while($j<count($pasajeros)) {
                    if($dni == $pasajeros[$j]['nroDoc']) {
                        $pasajeros[$j]['nombre'] = $nombre ; 
                        $this -> setPasajeros($pasajeros) ; 
                        $j = count($pasajeros) ; 
                        $existe = true ; 
                    }
                    $j++ ; 
                }
            return $existe ; 
        }

        /**
         * Cambia el apellido del pasajero 
         * @param int $dni
         * @param string $apellido
         * @return boolean
         */
        public function cambiarApellido($dni, $apellido) {
            // array $pasajeros
            // boolean $existe
            // int $j 

            $pasajeros = $this -> getPasajeros() ; 
            $existe = false ;
            $j = 0 ;
                while($j<count($pasajeros)) {
                    if($dni == $pasajeros[$j]['nroDoc']) { 
                        $pasajeros[$j]['apellido'] = $apellido ; 
                        $this -> setPasajeros($pasajeros) ; 
                        $j = count($pasajeros) ; 
                        $existe = true ; 
                    }
                    $j++ ; 
                }
            return $existe ; 
        }

        /**
         * Cambia el dni del pasajero 
         * @param int $dni
         * @param string $nombre
         * @param string $apellido
         * @return boolean
         */
        public function cambiarDni($dni, $nombre, $apellido) {
            // array $pasajeros
            // boolean
            // int $j 

            $pasajeros = $this -> getPasajeros() ; 
            $existe = false ; 
            $j = 0 ; 
                while($j<count($pasajeros)) {             
                        if($nombre == $pasajeros[$j]['nombre']) {
                            if($apellido == $pasajeros[$j]['apellido']) {
                                $pasajeros[$j]['nroDoc'] = $dni ; 
                                $this -> setPasajeros($pasajeros) ; 
                                $j = count($pasajeros) ; 
                                $existe = true ; 
                            }
                        }   
                    
                    $j++ ; 
                }
                if($existe == false) {
                    echo "No existe el nro de documento ingresado \n" ; 
                    echo "\n" ; 
                } 
            return $existe ; 
        }

        /**
         * ELimina un pasajero de el viaje
         * @param int $dni 
         * @return boolean
         */
        public function eliminarPasajero($dni) {
            // array $pasajeros
            // boolean $eliminado
            // int $j 

            $j=0 ; 
            $eliminado = false ; 
            $pasajeros = $this -> getPasajeros() ; 

                while($j<count($pasajeros)) {
                    if($dni == $pasajeros[$j]['nroDoc']) {
                        /* array_splice elimina de $pasajeros $desde la posicion $j '1 elemento' */                  
                        array_splice($pasajeros, $j, 1) ; 
                        $eliminado = true ;
                        $this -> setPasajeros($pasajeros) ; 
                        $j = count($pasajeros) ;
                    }
                    $j++ ; 
                }
            return $eliminado ; 
        }   
        
        /**
         * Agrega un pasajero al viaje  
         * @param string $nombre
         * @param string $apellido
         * @param int $dni
         * @param int $cantPasajeros
         * @param int $cantMaxPasajeros
         * @return boolean
         */
        public function agregaPasajero($nombre, $apellido, $dni, $cantPasajeros, $cantMaxPasajeros) {
            // array $pasajeros $pasajeroNuevo
            // boolean $agregado

            $pasajeros = $this -> getPasajeros() ;
            $pasajeroNuevo = [
                "nombre" => $nombre , 
                "apellido" => $apellido , 
                "nroDoc" => $dni 
            ] ;
            $agregado = false ; 

                if($cantPasajeros < $cantMaxPasajeros) {
                    $pasajeroNuevo['nombre'] = $nombre ; 
                    $pasajeroNuevo['apellido'] = $apellido ; 
                    $pasajeroNuevo['nroDoc'] = $dni ;
                    array_push($pasajeros, $pasajeroNuevo) ; 
                    $this -> setPasajeros($pasajeros) ; 
                    $agregado = true ;
                } 
            return $agregado ; 
        }

        /**
         * Almacena en una cadena los datos de los pasajeros
         * @return string
         */
        public function datosPasajeros() {
            // string $cadena, $nombre, $apellido
            // int $dni
            // array $pasajeros

            $cadena = "" ; 
            $pasajeros[] = [
                "nombre" => '' ,
                "apellido" => '' ,
                "nroDoc" => ''
            ] ; 
            
            $pasajeros = $this -> getPasajeros() ; 
            
            for($i=0 ; $i<count($pasajeros) ; $i++) {
                $nombre = $pasajeros[$i]['nombre']  . "\n" ;
                $apellido = $pasajeros[$i]['apellido'] . "\n" ;
                $dni = $pasajeros[$i]['nroDoc'] . "\n" ; 
                $cadena = $cadena . "Nombre: " . $nombre .
                    "Apellido: " . $apellido . 
                    "Numero de documento: " . $dni ; 
            }    
            return $cadena ; 
        }   
        
        public function __toString() {
            $cadena = $this -> datosPasajeros() ; 
            return "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "Datos de los pasajeros: " . "\n" . $cadena ;                
        }
    }