<?php 
    
    class Inscripcion {
        private $idInscripcion ; 
        private $fechaRealiza ; 
        private $costoFinal ;
        private $idModulo ;
        private $dni ; 
        private $coleccInscripciones ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
        } 

        public function getiIdentificacion() {
            return $this -> idInscripcion ; 
        }
        public function getfechaRealizacion() {
            return $this -> fechaRealiza ; 
        }
        public function getCostoFinal() {
            return $this -> costoFinal ; 
        }
        public function getMIdentificacion() {
            return $this -> idModulo ; 
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

        public function setiIdentificacion($idInscripcion) {
            $this -> idInscripcion = $idInscripcion ; 
        }
        public function setfechaRealizacion($fechaRealiza) {
            $this -> fechaRealiza = $fechaRealiza ; 
        }
        public function setCostoFinal($costoFinal) {
            $this -> costoFinal = $costoFinal ; 
        } 
        public function setMIdentificacion($idModulo) {
            $this -> idModulo = $idModulo ; 
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
        * @param int $idInscipcion
        * @param string $fechaRealiza
        * @param float $costoFinal
        * @param int $idModulo
        * @param int $dni
        * Carga el objeto con los valores que se pasan por parametro
        */
        public function cargar($idInscripcion, $fechaRealiza, $costoFinal, $idModulo, $dni) {
            $this -> setiIdentificacion($idInscripcion) ; 
            $this -> setfechaRealizacion($fechaRealiza) ; 
            $this -> setCostoFinal($costoFinal) ; 
            $this -> setMIdentificacion($idModulo) ; 
            $this -> setIDni($dni) ; 
        }

        /**
        * Recupera los datos de un inscripcion por su idInscripcion
        * @param int $idInscripcion
        * @return true en caso de encontrar los datos, false en caso contrario 
        */		
        public function Buscar($idInscripcion) {
            $base = new BaseDatos() ;
            $consulta = "Select * from inscripcion where iId = " . $idInscripcion ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setiIdentificacion($idInscripcion) ;
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

        /**
         * Obtiene una lista de actividades de la base de datos que cumplan con una condición opcional
         * @param string $condicion
         * @return array
         */
        public function listar($condicion = "") {
            $coleccInscripciones = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from inscripcion " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by iidentificacion	 " ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccInscripciones = [] ;
                        while($row = $base -> Registro()) {
                            $idInscripcion = $row['iidentificacion'] ; 
                            $fechaRealiza = $row['fecha_realizacion'] ;
                            $costoFinal = $row['costo_final'] ;
                            $idModulo = $row['midentificacion'] ;
                            $dni = $row['dni'] ; 

                            $inscripcion = new inscripcion() ;
                            $inscripcion -> cargar($idInscripcion, $fechaRealiza, $costoFinal, $idModulo, $dni) ; 
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
        
        /**
         * Inserta los valores en sus respectivas tablas de la base de datos
         * @return boolean 
         */
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 

            $consulta = "INSERT INTO inscripcion(iidentificacion, fecha_realizacion, costo_final, midentificacion, dni) 
                    VALUES (" .
                        $this -> getiIdentificacion() . ",'".
                        $this -> getfechaRealizacion() . "','".
                        $this -> getcostoFinal() . "','".
                        $this -> getMIdentificacion() . "','".
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
        
        /**
         * Modifica los valores de sus respectivas tablas en la base de datos
         * @return boolean
         */
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
        
        /**
         * Elimina una fila de la base de datos por su id
         * @return boolean 
         */
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
            "Costo final de la inscripcion: " . $this -> getCostoFinal() . "\n" .
            "Idetificacion del modulo: " . $this -> getMIdentificacion() . "\n" . 
            "DNI del ingresante: " . $this -> getIDni() ; 
        }
    }