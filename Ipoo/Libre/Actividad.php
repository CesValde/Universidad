<?php 

    class Actividad {
        private $aId ; 
        private $descripCorta ; 
        private $descripLarga ;
        private $coleccActividades ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
        } 

        public function getAIdentificacion() {
            return $this -> aId ; 
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

        public function setAIdentificacion($aId) {
            $this -> aId = $aId ; 
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
         * @param int $aId
         * @param string $descripCorta
         * @param string $descripLarga
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($aId, $descripCorta, $descripLarga) {
            $this -> setAIdentificacion($aId) ; 
            $this -> setDescripcionCorta($descripCorta) ; 
            $this -> setDescripcionLarga($descripLarga) ; 
        }

        /**
         * Recupera los datos de una actividad por su identificacion 
         * @param int $aId
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($aId) {
            $base = new BaseDatos() ;
            $consulta = "Select * from actividad where aidentificacion = " . $aId ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setAIdentificacion($aId) ;
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

        // preguntar a chat como funciona xd
        public function listar($condicion = "") {
            // $coleccActividades = null ;
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
                            $aId = $row['aidentificacion'] ; 
                            $descripCorta = $row['adescripcioncorta'] ; 
                            $descripLarga = $row['adescripcionlarga'] ;

                            $actividad = new Actividad() ;
                            $actividad -> cargar($aId, $descripCorta, $descripLarga) ;
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