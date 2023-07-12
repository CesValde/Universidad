<?php 
    
    class Inscripcion {
        private $iId ; 
        private $fechaRealiza ; 
        private $costoFinal ;
        private $mId ;
        private $dni ; 
        private $coleccInscripciones ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
        } 

        public function getiIdentificacion() {
            return $this -> iId ; 
        }
        public function getfechaRealizacion() {
            return $this -> fechaRealiza ; 
        }
        public function getcostoFinal() {
            return $this -> costoFinal ; 
        }
        public function getMIdentificacion() {
            return $this -> mId ; 
        }
        public function getIDni() {
            return $this -> dni ; 
        }
        public function getcoleccInscripciones() {
            return $this -> coleccInscripciones ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }

        public function setiIdentificacion($iId) {
            $this -> iId = $iId ; 
        }
        public function setfechaRealizacion($fechaRealiza) {
            $this -> fechaRealiza = $fechaRealiza ; 
        }
        public function setcostoFinal($costoFinal) {
            $this -> costoFinal = $costoFinal ; 
        } 
        public function setMIdentificacion($mId) {
            $this -> mId = $mId ; 
        } 
        public function setIDni($dni) {
            $this -> dni = $dni ; 
        } 
        public function setcoleccInscripciones($coleccInscripciones) {
            $this -> coleccInscripciones = $coleccInscripciones ; 
        }
        public function setMensajeOPeracion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
        * @param int $
        * @param string $
        * @param string $
        *
        *
        *
        * Carga el objeto con los valores que se pasan por parametro
        */
        public function cargar($iId, $fechaRealiza, $costoFinal, $mId, $dni) {
            $this -> setiIdentificacion($iId) ; 
            $this -> setfechaRealizacion($fechaRealiza) ; 
            $this -> setcostoFinal($costoFinal) ; 
            $this -> setMIdentificacion($mId) ; 
            $this -> setIDni($dni) ; 
        }

        /**
        * Recupera los datos de un inscripcion por su iId
        * @param int $
        * @return true en caso de encontrar los datos, false en caso contrario 
        */		
        public function Buscar($iId) {
            $base = new BaseDatos() ;
            $consulta = "Select * from inscripcion where iId = " . $iId ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setiIdentificacion($iId) ;
                        $this -> setfechaRealizacion($row['fecha_realizacion']) ; 
                        $this -> setcostoFinal($row['costo_final']) ;
                        $this -> setMIdentificacion($row['midentificacion']) ;
                        $this -> setIDni($row['dni']) ;
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

        // preguntar a chat como funciona xd
        public function listar($condicion = "") {
            $coleccInscripciones = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from inscripcion " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by iId " ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccInscripciones = [] ;
                        while($row = $base -> Registro()) {
                            $iId = $row['iidentificacion'] ; 
                            $fechaRealiza = $row['fecha_realizacion'] ;
                            $costoFinal = $row['costo_final'] ;
                            $mId = $row['midentificacion'] ;
                            $dni = $row['dni'] ; 

                            /* ??? */
                            $inscripcion = new inscripcion() ;
                            $coleccInscripciones = $inscripcion -> listar() ;  
                            $inscripcion = new inscripcion() ;
                            $inscripcion -> cargar($iId, $fechaRealiza, $costoFinal, $mId, $dni) ; 
                            array_push($coleccInscripciones, $inscripcion) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccInscripciones ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 

            $consulta = "INSERT INTO inscripcion(iidentificacion, fecha_realizacion, costo_final, midentificacion) 
                    VALUES (" .
                        $this -> getiIdentificacion() . ",'".
                        $this -> getfechaRealizacion() . ",'".
                        $this -> getcostoFinal() . ",'".
                        $this -> getMIdentificacion() . ",'".
                        $this -> getIDni(). "')" ;
            
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
            $consulta = "UPDATE inscripcion SET 
                fecha_realizacion = '" . $this -> getfechaRealizacion() .
                "' ,costo_final = '" . $this -> getcostoFinal() .
                "' ,midentificacion = '" . $this -> getMIdentificacion() .
                "' ,dni = '" . $this -> getIDni() .
                "' WHERE iId =" . $this -> getiIdentificacion() ;

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
                $consulta = "DELETE FROM inscripcion WHERE iId = " . $this -> getiIdentificacion() ;
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
            return 
            "\n" . 
            "Identificacion de la inscripcion: " . $this -> getiIdentificacion() . "\n" . 
            "fecha de realizacion de la inscripcion: " . $this -> getfechaRealizacion() . "\n" . 
            "Costo final de la inscripcion: " . $this -> getcostoFinal() . "\n" ;
            "Idetificacion del modulo: " . $this -> getMIdentificacion() . "\n" . 
            "DNI del ingresante: " . $this -> getIDni() ; 
        }
    }