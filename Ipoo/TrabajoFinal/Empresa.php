<?php

    class Empresa {
        private $idEmpresa ; 
        private $eNombre ; 
        private $eDireccion ;
        private $mensajeOperacion ; 
        private $coleccEmpresas ;

        public function __construct(
        ) { 
            $this -> idEmpresa = 0 ;
            $this -> eNombre = "" ;
            $this -> eDireccion =  "" ;
            $this -> mensajeOperacion = "" ;
            $this -> coleccEmpresas = [] ;
        } 

        public function getIdEmpresa() {
            return $this -> idEmpresa ; 
        }
        public function getENombre() {
            return $this -> eNombre ; 
        }
        public function getEDireccion() {
            return $this -> eDireccion ; 
        }
        public function getMensajeOperacion() {
            return $this -> mensajeOperacion ; 
        }
        public function getColeccEmpresas() {
            return $this -> coleccEmpresas ; 
        }

        public function setIdEmpresa($idEmpresa) {
            $this -> idEmpresa = $idEmpresa ; 
        }
        public function setENombre($eNombre) {
            $this -> eNombre = $eNombre ; 
        }
        public function setEDireccion($eDireccion) {
            $this -> eDireccion = $eDireccion ; 
        } 
        public function setmensajeoperacion($mensajeOperacion) {
            $this -> mensajeOperacion = $mensajeOperacion ; 
        }

        /**
         * @param int $idEmpresa
         * @param string $eNombre
         * @param string $eDireccion
         * Carga el objeto con los valores que se pasan por parametro
         */
        public function cargar($idEmpresa, $eNombre, $eDireccion) {
            $this -> setIdEmpresa($idEmpresa) ; 
            $this -> setENombre($eNombre) ;
            $this -> setEDireccion($eDireccion) ; 
        }

        /**
         * Recupera los datos de una empresa por el idEmpresa
         * @param int $idEmpresa
         * @return true en caso de encontrar los datos, false en caso contrario 
         */		
        public function Buscar($idEmpresa) {
            $base = new BaseDatos() ;
            $consultaEmpresa = "Select * from empresa where idempresa = " . $idEmpresa ;
            $resp = false;

                if($base -> Iniciar()){
                    if($base -> Ejecutar($consultaEmpresa)) {
                        if($row = $base -> Registro()) {					
                            $this -> setIdEmpresa($idEmpresa) ;
                            $this -> setENombre($row['enombre']) ;
                            $this -> setEDireccion($row['edireccion']) ;
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
            $coleccEmpresas = null ;
            $base = new BaseDatos() ;
            $consultaEmpresas = "Select * from empresa " ;

            if($condicion != "") {
                $consultaEmpresas = $consultaEmpresas . ' where ' . $condicion ;
            }
            $consultaEmpresas .= " order by enombre " ;
            //echo $consultaEmpresas ;
            if($base -> Iniciar()) {
                if($base -> Ejecutar($consultaEmpresas)) {				
                    $coleccEmpresas = [] ;
                    while($row = $base -> Registro()){
                        $idEmpresa = $row['idempresa'] ;
                        $eNombre = $row['enombre'] ;
                        $eDireccion = $row['edireccion'] ;
                        $empresa = new Empresa() ;
                        $empresa -> cargar($idEmpresa, $eNombre, $eDireccion) ;
                        array_push($coleccEmpresas, $empresa) ;
                    }
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }	
            return $coleccEmpresas ;
        }	
        
        public function insertar() {
            $base = new BaseDatos() ;
            $resp = false ;
            $consulta = "INSERT INTO empresa(idempresa, enombre, edireccion) 
                VALUES (
                " . $this -> getIdEmpresa() . ",
                '" . $this -> getENombre() . "',
                '" . $this -> getEDireccion() . "'
                )" ;
            
            if($base -> Iniciar()){
                if($base -> Ejecutar($consulta)){
                    $resp = true;
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
            $base = new BaseDatos();
            $consulta = 
                "UPDATE empresa SET 
                enombre =' " . $this -> getENombre() .
                " ', edireccion =' " . $this -> getEDireccion() .
                " ' WHERE idempresa =" . $this-> getIdEmpresa() ;

            if($base -> Iniciar()) {
                if($base -> Ejecutar($consulta)) {
                    $resp=  true;
                } else {
                    $this -> setmensajeoperacion($base -> getError()) ;  
                }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp ;
        }
        
        public function eliminar(){
            $base = new BaseDatos() ;
            $resp = false ;

            if($base -> Iniciar()) {
                $consulta = "DELETE FROM empresa WHERE idempresa = " . $this -> getIdEmpresa() ;
                    if($base -> Ejecutar($consulta)) {
                        $resp = true ;
                    } else {
                        $this -> setmensajeoperacion($base -> getError()) ;
                    }
            } else {
                $this -> setmensajeoperacion($base -> getError()) ;
            }
            return $resp; 
        }

        public function __toString() {
            return "\n" . 
            "Id de la empresa: " . $this -> getIdEmpresa() . "\n" .
            "Nombre de la empresa: " . $this -> getENombre() . "\n" .
            "Direccion de la empresa: " . $this -> getEDireccion() . "\n" ;
        } 
    }