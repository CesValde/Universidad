<?php 

    class Viaje {
        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $idEmpresa ;  
        private $coleccPasajeros ;  
        private $responsable ; 
        private $precioTicket ;
        private $mensajeOperacion ; 
      

        public function __construct() {
            $this -> codigoViaje = 0 ; 
            $this -> destino =  "" ;
            $this -> cantMaxPasajeros = 0 ;
            $this -> coleccPasajeros = [] ;
            $this -> responsable = new Responsable() ;
            $this -> precioTicket = 0 ;
            $this -> mensajeOperacion = "" ; 
        }

        public function getCodigoViaje() {
            return $this -> codigoViaje ; 
        }
        public function getDestino() {
            return $this -> destino ; 
        }
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros ; 
        }
        public function getIdEmpresa() {
            return $this -> idEmpresa ; 
        }
        public function getColeccPasajeros() {
            return $this -> coleccPasajeros ; 
        }
        public function getResponsable() {
            return $this -> responsable ; 
        }
        public function getPrecioTicket() {
            return $this -> precioTicket ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }
        
        public function setCodigoViaje($codigoViaje) {
            $this -> codigoViaje = $codigoViaje ; 
        }
        public function setDestino($destino) {
            $this -> destino = $destino ;   
        }
        public function setCantMaxPasajeros($cantMaxPasajeros) {
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
        }
        public function setIdEmpresa($idEmpresa) {
            $this -> idEmpresa = $idEmpresa ; 
        }
        public function setColeccPasajeros($coleccPasajeros) {
            $this -> coleccPasajeros = $coleccPasajeros ; 
        }
        public function setResponsable($responsable) {
            $this -> responsable = $responsable ; 
        }
        public function setPrecioTicket($precioTicket) {
            $this -> precioTicket = $precioTicket ; 
        }
        public function setmensajeoperacion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
         * @param string $
         * @param string $
         * @param int $
         * @param int $
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($codigoViaje, $destino, $cantMaxPasajeros, $idEmpresa, $coleccPasajeros, $responsable, $precioTicket) {
            $this -> setCodigoViaje($codigoViaje) ; 
            $this -> setDestino($destino) ;
            $this -> setCantMaxPasajeros($cantMaxPasajeros) ; 
            $this -> setIdEmpresa($idEmpresa) ; 
            $this -> setColeccPasajeros($coleccPasajeros) ; 
            $this -> setResponsable($responsable) ; 
            $this -> setPrecioTicket($precioTicket) ; 
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
                                $coleccPasajeros[$j] -> setNroDocPasajero($nroDocPasaj) ; 
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

            $disponible = $this -> hayPasajeDisponible($cantPasajeros) ;
                if($disponible) {              
                    $precioTicket = $this -> getPrecioTicket() ;
                    $cantPasajeros++ ;  
                    $importe = $precioTicket + ($precioTicket * $descuento) ; 
                    array_push($coleccPasajeros, $pasajero) ;
                    $this -> setColeccPasajeros($coleccPasajeros) ;
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



        /* TP Final */

        /**
         * Recupera los datos de un viaje por codigo de viaje 
         * @param int $codigoViaje
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($codigoViaje) {
            $base = new BaseDatos() ;
            $consulta = "Select * from viaje  where idviaje = " . $codigoViaje ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setCodigoViaje($codigoViaje) ;
                        $this -> setDestino($row['vdestino']) ;
                        $this -> setCantMaxPasajeros($row['vcantmaxpasajeros']) ;
                        $this -> setIdEmpresa($row['idempresa']) ;
                        $this -> setResponsable($row['rnumeroempleado']) ;
                        $this -> setPrecioTicket($row['vimporte']) ;

                        /* $coleccPasajeros = $this -> getColeccPasajeros() ; 
                        $coleccPasajeros = $this -> listar("order by papellido") ; 
                        $this -> ($row['']) ;       // coleccion de pasajeros ? */
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
            $coleccViajes = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from viaje " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by idviaje " ;
            //echo $consultaPersonas;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccViajes = [] ;
                        while($row = $base -> Registro()) {
                            $codigoViaje = $row['idviaje'] ; 
                            $destino = $row['vdestino'] ; 
                            $cantMaxPasajeros = $row['vcantmaxpasajeros'] ;
                            $idEmpresa = $row['idempresa'] ;
                            $responsable = $row['rnumeroempleado'] ;
                            $precioTicket = $row['vimporte'] ;

                            /* ??? */
                            $pasajero = new Pasajero() ;
                            $coleccPasajeros = $pasajero -> listar() ;  
                            $viaje = new Viaje() ;
                            $viaje -> cargar($codigoViaje, $destino, $cantMaxPasajeros, $idEmpresa, $coleccPasajeros, $responsable, $precioTicket) ;
                            array_push($coleccViajes, $viaje) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccViajes ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 
            $responsable = $this -> getResponsable() ;
            $nroEmpleado = $responsable -> getNroEmpleado() ; 

            $consulta = "INSERT INTO viaje(idviaje, vdestino, vcantmaxpasajeros, idempresa, rnumeroempleado, vimporte) 
                    VALUES (" .
                        $this -> getCodigoViaje() . ",'".
                        $this -> getDestino() . "','" .
                        $this -> getCantMaxPasajeros() . "','" . 
                        $this -> getIdEmpresa() . "','" .
                        $nroEmpleado . "','" .        // objeto completo o el numero no mas ?
                        // coleccion de viajes ?
                        $this -> getPrecioTicket(). "')" ;
            
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
        
        public function modificar() {
            $resp = false ; 
            $base = new BaseDatos() ;
            $consulta = "UPDATE viaje SET 
                vdestino = '" . $this -> getDestino() .
                "' ,vcantmaxpasajeros = '" . $this -> getCantMaxPasajeros() .
                "' ,idempresa = '" . $this -> getIdEmpresa() .
                "' ,rnumeroempleado = '" . $this -> getResponsable() -> getNroEmpleado() .
                "' ,vimporte = '" . $this -> getPrecioTicket() .
                "' WHERE idviaje =" . $this -> getCodigoViaje() ;

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
        
        public function eliminar() {
            $base = new BaseDatos() ;
            $resp = false ;

            if($base -> Iniciar()) {
                $consulta = "DELETE FROM viaje WHERE idviaje = " . $this -> getCodigoViaje() ;
                    if($base -> Ejecutar($consulta)) {
                        $resp = true ;
                    } else {
                        $this -> setmensajeoperacion($base -> getError()) ;
                    }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp ; 
        }
        
        public function __toString() {
           $cadena = $this -> datosPasajeros() ; 

            return "\n" .
                "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "Precio del ticket: " . $this -> getPrecioTicket() . "\n" .  
                "\n" . 
                "Datos del responsable: " . $this -> getResponsable() . "\n" .
                "Datos de los pasajeros: " . "\n" . $cadena . "\n" ; 
        } 
    }