<?php 

    class Actividad {
        private $idActividad ; 
        private $descripCorta ; 
        private $descripLarga ;
        private $coleccActividades ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
        } 

        public function getAIdentificacion() {
            return $this -> idActividad ; 
        }
        public function getDescripcionCorta() {
            return $this -> descripCorta ; 
        }
        public function getDescripcionLarga() {
            return $this -> descripLarga ; 
        }
        public function getColeccActividades() {
            return $this -> coleccActividades ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }

        public function setAIdentificacion($idActividad) {
            $this -> idActividad = $idActividad ; 
        }
        public function setDescripcionCorta($descripCorta) {
            $this -> descripCorta = $descripCorta ; 
        }
        public function setDescripcionLarga($descripLarga) {
            $this -> descripLarga = $descripLarga ; 
        } 
        public function setColeccionActividades($coleccActividades) {
            $this -> coleccActividades = $coleccActividades ; 
        }
        public function setMensajeOPeracion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
         * @param int $idActividad
         * @param string $descripCorta
         * @param string $descripLarga
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($idActividad, $descripCorta, $descripLarga) {
            $this -> setAIdentificacion($idActividad) ; 
            $this -> setDescripcionCorta($descripCorta) ; 
            $this -> setDescripcionLarga($descripLarga) ; 
        }

        /**
         * Recupera los datos de una actividad por su identificacion 
         * @param int $idActividad
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($idActividad) {
            $base = new BaseDatos() ;
            $consulta = "Select * from actividad where aidentificacion = " . $idActividad ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setAIdentificacion($idActividad) ;
                        $this -> setDescripcionCorta($row['adescripcioncorta']) ;
                        $this -> setDescripcionLarga($row['adescripcionlarga']) ;
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
            $base = new BaseDatos() ;
            $consulta = "Select * from actividad " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by aidentificacion " ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccActividades = [] ;
                        while($row = $base -> Registro()) {
                            $idActividad = $row['aidentificacion'] ; 
                            $descripCorta = $row['adescripcioncorta'] ; 
                            $descripLarga = $row['adescripcionlarga'] ;
                            $actividad = new Actividad() ;
                            $actividad -> cargar($idActividad, $descripCorta, $descripLarga) ;
                            array_push($coleccActividades, $actividad) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccActividades ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 

            $consulta = "INSERT INTO actividad(aidentificacion,	adescripcioncorta, adescripcionlarga) 
                    VALUES (" .
                        $this -> getAIdentificacion() . ",'".
                        $this -> getDescripcionCorta() . "','" .
                        $this -> getDescripcionLarga(). "')" ;
            
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
            $consulta = "UPDATE actividad SET 
                adescripcioncorta = '" . $this -> getDescripcionCorta() .
                "' ,adescripcionlarga = '" . $this -> getDescripcionLarga() .
                "' WHERE aidentificacion =" . $this -> getAIdentificacion() ;

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
                $consulta = "DELETE FROM actividad WHERE aidentificacion = " . $this -> getAIdentificacion() ;
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
            "Identificacion de la actividad: " . $this -> getAIdentificacion() . "\n" . 
            "Descripcion corta: " . $this -> getDescripcionCorta() . "\n" . 
            "Descripcion larga: " . $this -> getDescripcionLarga() ; 
        }
    }