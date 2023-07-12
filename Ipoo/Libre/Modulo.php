<?php 

    class Modulo {
        private $mId ; 
        private $descrip ; 
        private $topeInscrip ;
        private $costo ; 
        private $horarioInicio ; 
        private $horarioCierre ; 
        private $fechaInicio ; 
        private $fechaFin ; 
        private $presencial ; 
        private $coleccModulos ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
            // ?? 
        } 

        public function getMIdentificacion() {
            return $this -> mId ; 
        }
        public function getDescripcion() {
            return $this -> descrip ; 
        }
        public function getTopeInscripcion() {
            return $this -> topeInscrip ; 
        }
        public function getCosto() {
            return $this -> costo ; 
        }
        public function getHorarioInicio() {
            return $this -> horarioInicio ; 
        }
        public function getHorarioCierre() {
            return $this -> horarioCierre ; 
        }
        public function getFechaInicio() {
            return $this -> fechaInicio ; 
        }
        public function getFechaFin() {
            return $this -> fechaFin ; 
        }
        public function getPresencial() {
            return $this -> presencial ; 
        }
        public function getColeccModulos() {
            return $this -> coleccModulos ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }

        public function setMIdentificacion($mId) {
            $this -> mId = $mId ; 
        }
        public function setDescripcion($descrip) {
            $this -> descrip = $descrip ; 
        }
        public function setTopeInscripcion($topeInscrip) {
            $this -> topeInscrip = $topeInscrip ; 
        }
        public function setCosto($costo) {
            $this -> costo = $costo ; 
        } 
        public function setHorarioInicio($horarioInicio) {
            $this -> horarioInicio = $horarioInicio ; 
        }
        public function setHorarioCierre($horarioCierre) {
            $this -> horarioCierre = $horarioCierre ; 
        }
        public function setFechaInicio($fechaInicio) {
            $this -> fechaInicio = $fechaInicio ; 
        }
        public function setFechaFin($fechaFin) {
            $this -> fechaFin = $fechaFin ; 
        }
        public function setPresencial($presencial) {
            $this -> presencial = $presencial ; 
        }
        public function setColeccModulos($coleccModulos) {
            $this -> coleccModulos = $coleccModulos ; 
        }
        public function setMensajeOperacion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
         * @param int $mId
         * @param string $descrip
         * @param string $
         * 
         * 
         * 
         * 
         * 
         * 
         * 
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($mId, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial) {
            $this -> setMIdentificacion($mId) ; 
            $this -> setDescripcion($descrip) ; 
            $this -> setTopeInscripcion($topeInscrip) ; 
            $this -> setCosto($costo) ;
            $this -> setHorarioInicio($horarioInicio) ; 
            $this -> setHorarioCierre($horarioCierre) ; 
            $this -> setFechaInicio($fechaInicio) ; 
            $this -> setFechaFin($fechaFin) ; 
            $this -> setPresencial($presencial) ; 
        }

        /**
         * Recupera los datos de un modulo por su identificacion 
         * @param int $mId
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($mId) {
            $base = new BaseDatos() ;
            $consulta = "Select * from modulo where midentificacion = " . $mId ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setMIdentificacion($mId) ; 
                        $this -> setDescripcion($row['descripcion']) ; 
                        $this -> setTopeInscripcion($row['tope_inscripciones']) ; 
                        $this -> setCosto($row['costo']) ;
                        $this -> setHorarioInicio($row['horario_inicio']) ; 
                        $this -> setHorarioCierre($row['horario_cierre']) ; 
                        $this -> setFechaInicio($row['fecha_inicio']) ; 
                        $this -> setFechaFin($row['fecha_fin']) ; 
                        $this -> setPresencial($row['es_en_linea']) ; 
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
            $coleccModulos = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from modulo " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by aidentificacion " ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccModulos = [] ;
                        while($row = $base -> Registro()) {
                            $mId = $row['aidentificacion'] ; 
                            $descrip = $row['descripcion'] ; 
                            $topeInscrip = $row['tope_inscripciones'] ; 
                            $costo = $row['costo'] ;
                            $horarioInicio = $row['horario_inicio'] ; 
                            $horarioCierre = $row['horario_cierre'] ; 
                            $fechaInicio = $row['fecha_inicio'] ; 
                            $fechaFin = $row['fecha_fin'] ; 
                            $presencial = $row['es_en_linea'] ; 

                            /* ??? */
                            $modulo = new Modulo() ;
                            $coleccModulos = $modulo -> listar() ;  
                            $modulo = new Modulo() ;
                            $modulo -> cargar($mId, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial) ;
                            array_push($coleccModulos, $modulo) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccModulos ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 

            $consulta = "INSERT INTO modulo(
                midentificacion, 
                descripcion, 
                tope_inscripciones, 
                costo, 
                horario_inicio, 
                horario_cierre, 
                fecha_inicio, 
                fecha_fin, 
                es_en_linea 
                ) 
                    VALUES (" .
                        $this -> getMIdentificacion() . ",'".
                        $this -> getDescripcion() . "','" .
                        $this -> getTopeInscripcion() . "','" .
                        $this -> getCosto() . "','" .
                        $this -> getHorarioInicio() . "','" .
                        $this -> getHorarioCierre() . "','" .
                        $this -> getFechaInicio() . "','" .
                        $this -> getFechaFin() . "','" .
                        $this -> getPresencial(). "')" ;
            
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
            $consulta = "UPDATE modulo SET 
                descripcion = '" . $this -> getDescripcion() .
               "' ,tope_inscripciones = '" . $this -> getTopeInscripcion() .
               "' ,costo = '" . $this -> getCosto() .
               "' ,horario_inicio = '" . $this -> getHorarioInicio() .
               "' ,horario_cierre = '" . $this -> getHorarioCierre() .
               "' ,fecha_inicio = '" . $this -> getFechaInicio() .
               "' ,fecha_fin = '" . $this -> getFechaFin() .
               "' ,es_en_linea = '" . $this -> getPresencial() .
                "' WHERE midentificacion =" . $this -> getMIdentificacion() ;

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
                $consulta = "DELETE FROM modulo WHERE midentificacion = " . $this -> getMIdentificacion() ;
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

        public function darCostoMódulo() {
            $total = $this -> getCosto() ; 

            return $total ; 
        }

        public function __toString() {
            return 
            "\n" . 
            "Identificacion del modulo: " . $this -> getMIdentificacion() . "\n" . 
            "Descripcion: " . $this -> getDescripcion() . "\n" . 
            "Tope de inscripciones: " . $this -> getTopeInscripcion() . "\n" . 
            "Costo: " . $this -> getCosto() . "\n" . 
            "Horario de inicio: " . $this -> getHorarioInicio() . "\n" . 
            "Horario de cierre: " . $this -> getHorarioCierre() . "\n" . 
            "Fecha inicio: " . $this -> getFechaInicio() . "\n" . 
            "Fecha cierre: " . $this -> getFechaFin() . "\n" . 
            "Presencial: " . $this -> getPresencial() ; 
        }
    }