<?php 
    
    class Ingresante {
        private $dni ; 
        private $nombre ; 
        private $apellido ;
        private $legajo ;
        private $correo ;
        private $coleccIngresantes ; 
        private $mensajeOperacion ; 

        public function __construct(
        ) { 
        } 

        public function getDni() {
            return $this -> dni ; 
        }
        public function getNombre() {
            return $this -> nombre ; 
        }
        public function getApellido() {
            return $this -> apellido ; 
        }
        public function getLegajo() {
            return $this -> legajo ; 
        }
        public function getCorreo() {
            return $this -> correo ; 
        }
        public function getColeccIngresantes() {
            return $this -> coleccIngresantes ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }

        public function setDni($dni) {
            $this -> dni = $dni ; 
        }
        public function setNombre($nombre) {
            $this -> nombre = $nombre ; 
        }
        public function setApellido($apellido) {
            $this -> apellido = $apellido ; 
        } 
        public function setLegajo($legajo) {
            $this -> legajo = $legajo ; 
        }
        public function setCorreo($correo) {
            $this -> correo = $correo ; 
        }
        public function setColeccIngresantes($coleccIngresantes) {
            $this -> coleccIngresantes = $coleccIngresantes ; 
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
        public function cargar($dni, $nombre, $apellido, $legajo, $correo) {
            $this -> setDni($dni) ; 
            $this -> setNombre($nombre) ; 
            $this -> setApellido($apellido) ; 
            $this -> setLegajo($legajo) ; 
            $this -> setCorreo($correo) ; 
        }

        /**
        * Recupera los datos de un ingresante por su dni
        * @param int $
        * @return true en caso de encontrar los datos, false en caso contrario 
        */		
        public function Buscar($dni) {
            $base = new BaseDatos() ;
            $consulta = "Select * from ingresante where dni = " . $dni ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setDni($dni) ;
                        $this -> setCorreo($row['correo_electronico']) ;
                        $this -> setLegajo($row['legajo']) ;
                        $this -> setNombre($row['nombre']) ;
                        $this -> setApellido($row['apellido']) ;
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
            $coleccIngresantes = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from ingresante " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by dni " ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccIngresantes = [] ;
                        while($row = $base -> Registro()) {
                            $dni = $row['dni'] ; 
                            $correo = $row['correo_electronico'] ; 
                            $legajo = $row['legajo'] ;
                            $nombre = $row['nombre'] ;
                            $apellido = $row['apellido'] ;

                            /* ??? */
                            $ingresante = new Ingresante() ;
                            $coleccIngresantes = $ingresante -> listar() ;  
                            $ingresante = new Ingresante() ;
                            $ingresante -> cargar($dni, $nombre, $apellido, $legajo, $correo) ;
                            array_push($coleccIngresantes, $ingresante) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccIngresantes ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 

            $consulta = "INSERT INTO ingresante(dni, correo_electronico, legajo, nombre, apellido) 
                    VALUES (" .
                        $this -> getDni() . ",'".
                        $this -> getCorreo() . "','" .
                        $this -> getLegajo() . "','" .
                        $this -> getNombre() . "','" .
                        $this -> getApellido(). "')" ;
            
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
            $consulta = "UPDATE ingresante SET 
                correo_electronico = '" . $this -> getCorreo() .
                "' ,legajo = '" . $this -> getLegajo() .
                "' ,nombre = '" . $this -> getNombre() .
                "' ,apellido = '" . $this -> getApellido() .
                "' WHERE dni =" . $this -> getDni() ;

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
                $consulta = "DELETE FROM ingresante WHERE dni = " . $this -> getDni() ;
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
            "DNI del ingresante: " . $this -> getDni() . "\n" . 
            "Nombre del ingresante: " . $this -> getNombre() . "\n" . 
            "Apellido del ingresante: " . $this -> getApellido() . "\n" . 
            "Legajo del ingresante: " . $this -> getLegajo() . "\n" . 
            "Correo del ingresante: " . $this -> getCorreo() ; 
        }
    }
    