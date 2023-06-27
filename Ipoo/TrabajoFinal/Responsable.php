<?php 

    class Responsable {
        private $rNroEmpleado ; 
        private $rNroLicencia ; 
        private $rNombre ; 
        private $rApellido ; 
        private $coleccionResponsables ; 
        private $mensajeOperacion ; 

        public function __construct() {
            $this -> rNroEmpleado = 0 ;  
            $this -> rNroLicencia = 0 ; 
            $this -> rNombre =  "" ; 
            $this -> rApellido = "" ; 
            $this -> coleccionResponsables = [] ; 
            $this -> mensajeOperacion = "" ;
        }
 
        public function getNroEmpleado() {
            return $this -> rNroEmpleado ; 
        }
        public function getNroLicencia() {
            return $this -> rNroLicencia ; 
        }
        public function getNombreEmpleado() {
            return $this -> rNombre ; 
        }
        public function getApellidoEmpleado() {
            return $this -> rApellido ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }
        public function getColeccionResponsables() {
            return $this -> coleccionResponsables ; 
        } 


        public function setNroEmpleado($rNroEmpleado) {
            $this -> rNroEmpleado = $rNroEmpleado ; 
        }
        public function setNroLicencia($rNroLicencia) {
            $this -> rNroLicencia = $rNroLicencia ;   
        }
        public function setNombreEmpleado($rNombre) {
            $this -> rNombre = $rNombre ; 
        }
        public function setApellidoEmpleado($rApellido) {
            $this -> rApellido = $rApellido ; 
        }
        public function setmensajeoperacion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
         * @param int $
         * @param int $
         * @param string $
         * @param string $
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) {
            $this -> setNroEmpleado($rNroEmpleado) ; 
            $this -> setNroLicencia($rNroLicencia) ;
            $this -> setNombreEmpleado($rNombre) ; 
            $this -> setApellidoEmpleado($rApellido) ; 
        }

        /**
         * Recupera los datos del responsable por el numero de empleado
         * @param int $rNroEmpleado
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($rNroEmpleado) {
            $base = new BaseDatos() ;
            $consulta = "Select * from responsable where rnumeroempleado = " . $rNroEmpleado ;
            $resp = false ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    if($row = $base -> Registro()) {					
                        $this -> setNroEmpleado($rNroEmpleado) ;
                        $this -> setNroLicencia($row['rnumerolicencia']) ;
                        $this -> setNombreEmpleado($row['rnombre']) ;
                        $this -> setApellidoEmpleado($row['rapellido']) ;
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
            $coleccResponsables = null ;
            $base = new BaseDatos() ;
            $consulta = "Select * from responsable " ;

            if($condicion != "") {
                $consulta = $consulta . ' where ' . $condicion;
            }

            $consulta .= " order by rnumeroempleado " ;
            //echo $consultaPersonas;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {				
                    $coleccResponsables = [] ;
                        while($row = $base -> Registro()) {
                            $rNroEmpleado = $row['rnumeroempleado'] ;
                            $rNroLicencia = $row['rnumerolicencia'] ;
                            $rNombre = $row['rnombre'] ;
                            $rApellido = $row['rapellido'] ;
                            $responsable = new Responsable() ;
                            $responsable -> cargar($rNroEmpleado, $rNroLicencia, $rNombre, $rApellido) ;
                            array_push($coleccResponsables, $responsable) ;
                        }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccResponsables ;
        } 
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ; 
            $consulta = "INSERT INTO responsable(rnumeroempleado, rnumerolicencia, rnombre, rapellido) 
                    VALUES (" .
                        $this -> getNroEmpleado() . ",'".
                        $this -> getNroLicencia() . "','" .
                        $this -> getNombreEmpleado() . "','" . 
                        $this -> getApellidoEmpleado(). "')" ;
            
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
            $consulta = "UPDATE responsable SET 
                rnumerolicencia = '" . $this -> getNroLicencia() .
                "' , rnombre = '" . $this -> getNombreEmpleado () .
                "' , rapellido = '" . $this -> getApellidoEmpleado() .
                "' WHERE rnumeroempleado =" . $this -> getNroEmpleado() ;

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
                $consulta = "DELETE FROM responsable WHERE rnumeroempleado = " . $this -> getNroEmpleado() ;
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

        /*  public function mostrarResponsables() {



            return $cadenaResponsables ; 
            } */

        public function __toString() {
            return "\n" . 
                "Numero de empleado: " . $this -> getNroEmpleado() . "\n" . 
                "Numero de licencia: " . $this -> getNroLicencia() . "\n" . 
                "Nombre del empleado: " . $this -> getNombreEmpleado() . "\n" . 
                "Apellido del empleado: " . $this -> getApellidoEmpleado() . "\n" ;
        }
    }