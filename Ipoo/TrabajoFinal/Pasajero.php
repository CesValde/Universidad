<?php 

    class Pasajero {
        private $nombrePasaj ; 
        private $apellidoPasaj ; 
        private $nroDocPasaj ; 
        private $nroTelPasaj ; 
        private $viaje ; 
        private $mensajeOperacion ; 
        
        private $coleccPasajero ; 

        public function __construct() {
            $this -> nombrePasaj = "" ; 
            $this -> apellidoPasaj = "" ; 
            $this -> nroDocPasaj = 0 ; 
            $this -> nroTelPasaj = 0 ; 
            $this -> viaje = new Viaje() ; 
            $this -> mensajeOperacion = "" ; 

            $this -> coleccPasajero = [] ; 
        }
 
        public function getNombrePasajero() {
            return $this -> nombrePasaj ; 
        }
        public function getApellidoPasajero() {
            return $this -> apellidoPasaj ; 
        }
        public function getNroDocPasajero() {
            return $this -> nroDocPasaj ; 
        }
        public function getNroTelefPasajero() {
            return $this -> nroTelPasaj ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }
        public function getViaje() {
            return $this -> viaje ; 
        }
        public function getColeccionPasajero() {
            return $this -> coleccPasajero ; 
        }

        public function setNombrePasajero($nombrePasaj) {
            $this -> nombrePasaj = $nombrePasaj ; 
        }
        public function setApellidoPasajero($apellidoPasaj) {
            $this -> apellidoPasaj = $apellidoPasaj ;   
        }
        public function setNroDocPasajero($nroDocPasaj) {
            $this -> nroDocPasaj = $nroDocPasaj ; 
        }
        public function setNroTelefPasajero($nroTelPasaj) {
            $this -> nroTelPasaj = $nroTelPasaj ; 
        }
        public function setmensajeoperacion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }
        public function setViaje($viaje) {
            $this -> viaje = $viaje ; 
        }
        public function setColeccPasajero($coleccPasajero) {
            $this -> coleccPasajero = $coleccPasajero ; 
        }


        /**
         * @param string $apellidoPasaj
         * @param string $apellidoPasaj
         * @param int $nroDocPasaj
         * @param int $nroTelPasaj
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $viaje) {
            $this -> setNombrePasajero($nombrePasaj) ; 
            $this -> setApellidoPasajero($apellidoPasaj) ;
            $this -> setNroDocPasajero($nroDocPasaj) ; 
            $this -> setNroTelefPasajero($nroTelPasaj) ; 
            $this -> setViaje($viaje) ; 
        }

        /**
         * Recupera los datos de una persona por dni
         * @param int $dni
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($dni) {
            $base = new BaseDatos() ;
            $consultaPersona = "Select * from pasajero where pdocumento = " . $dni ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consultaPersona)) {
                    if($row = $base -> Registro()) {					
                        $this -> setNrodocpasajero($dni) ;
                        $this -> setNombrepasajero($row['pnombre']) ;
                        $this -> setApellidopasajero($row['papellido']) ;
                        $this -> setNroTelefPasajero($row['ptelefono']) ;
                        $this -> setViaje($row['idviaje']) ; 
                        $resp = true ;
                    }				
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ; 
            }		
            return $resp ; 
        }	

        public function listar($condicion = "") {
            $coleccPasajero = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from pasajero " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by papellido " ;
            //echo $consultaPersonas;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccPasajero = [] ;
                        while($row = $base -> Registro()) {
                            $nroDocPasaj = $row['pdocumento'] ;
                            $nombrePasaj = $row['pnombre'] ;
                            $apellidoPasaj = $row['papellido'] ;
                            $nroTelPasaj = $row['ptelefono'] ;
                            $viaje = $row['idviaje'] ;

                            $pasajero = new Pasajero() ;
                            $pasajero -> cargar($nombrePasaj, $apellidoPasaj, $nroDocPasaj, $nroTelPasaj, $viaje) ;
                            array_push($coleccPasajero, $pasajero) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccPasajero ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 
            $consulta = "INSERT INTO pasajero(pdocumento, papellido, pnombre, ptelefono, idviaje) 
                    VALUES (" .
                        $this -> getNroDocPasajero() . ",'".
                        $this -> getApellidoPasajero() . "','" .
                        $this -> getNombrePasajero() . "','" . 
                        $this -> getNroTelefPasajero(). "','" .
                        $this -> getViaje() -> getCodigoViaje() . "')" ;
            
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    $resp =  true ;
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;  
                }
            } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp ;
        }
        
        public function modificar(){
            $resp = false ; 
            $base = new BaseDatos() ;
            $consulta = "UPDATE persona SET 
                papellido = '" . $this -> getApellidoPasajero() .
                "' ,pnombre= '" . $this -> getNombrePasajero() .
                "' ,ptelefono= '" . $this -> getNroTelefPasajero() .
                "' ,idviaje= '" . $this -> getViaje() -> getCodigoViaje() .
                "' WHERE pdocumento=" . $this -> getNroDocPasajero() ;

            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    $resp =  true ;
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp;
        }
        
        public function eliminar() {
            $base = new BaseDatos() ;
            $resp = false ;

            if($base -> Iniciar()) {
                $consulta = "DELETE FROM persona WHERE pdocumento = " . $this -> getNroDocPasajero() ;
                    if($base -> Ejecutar($consulta)) {
                        $resp = true;
                    } else {
                        $this -> setmensajeoperacion($base -> getError()) ;
                    }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp ; 
        }

        /**
         * Almacena en una cadena los datos de los pasajeros
         * @return array
         */
        public function mostrarPasajeros() {
            // string $cadena 
            // array $coleccPasajeros
            // string $nombrePasaj, $apellidoPasaj
            // int $nroDocPasaj, $nroTelPasaj

            $cadena = "" ; 
            $coleccPasajeros = $this -> getColeccionPasajero() ; 

            foreach($coleccPasajeros as $pasajero) {
                $cadena = $cadena . $pasajero ;
            }    
            return $cadena ; 
        }

        public function __toString() {
            return 
                "Nombre: " . $this -> getNombrePasajero() . "\n" . 
                "Apellido: " . $this -> getApellidoPasajero() . "\n" .  
                "Nro de documento: " . $this -> getNroDocPasajero() . "\n" .  
                "Nro de Telefono: " . $this -> getNroTelefPasajero() . "\n" ;
        }    
    }