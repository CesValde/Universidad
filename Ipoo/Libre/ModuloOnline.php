<?php 

    class ModuloOnline extends Modulo {
        private $link ;
        private $bonus ; 

        public function __construct(
        ) {
        }

        public function getLink() {
            return $this -> link ;
        }
        public function getBonus() {
            return $this -> bonus ;
        }

        public function setLink($link) {
            $this -> link = $link ;
        }
        public function setBonus($bonus) {
            $this -> bonus = $bonus ;
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
         * Carga el objeto con los valores que se pasan por parámetro
         */

         public function cargarOnline($mId, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $aId, $link, $bonus) {
            parent::cargar($mId, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $aId);
            $this -> setLink($link);
            $this -> setBonus($bonus);
        } 

        /**
         * Recupera los datos de un modulo Online por su identificacion 
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
                        $this -> setAIdentifica($row['aidentificacion']) ; 

                        $this -> setLink($row['link_reunion']) ; 
                        $this -> setBonus($row['bonificacion']) ; 
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
                            $aId = $row['aidentificacion'] ; 

                            $link = $row['link_reunion'] ; 
                            $bonus = $row['bonificacion'] ; 

                            $modulo = new ModuloOnline() ;
                            $modulo -> cargarOnline($mId, $descrip, $topeInscrip, $costo, $horarioInicio, $horarioCierre, $fechaInicio, $fechaFin, $presencial, $aId, $link, $bonus) ;
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
                es_en_linea, 
                aidentificacion,
                link_reunion, 
                bonificacion
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
                        $this -> getPresencial() . "','" .
                        $this -> getAIdentifica() . "','" .
                        $this -> getLink() . "','" .
                        $this -> getBonus(). "')" ;
            
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
               "' ,aidentificacion = '" . $this -> getAIdentifica() .
               "' ,link_reunion = '" . $this -> getLink() .
               "' ,bonificacion = '" . $this -> getBonus() .
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
            $bonus = $this -> getBonus() ; 
            $subTotal = parent::darCostoMódulo() ; 
            $bonus = $bonus / 100 ; 

            $total = $subTotal - ($subTotal * $bonus) ;

            return $total ; 
        }
        
        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena . "\n" . 
            "Link: " . $this -> getLink() . 
            "Bonificacion: " . $this -> getBonus() ; 
        }
    }