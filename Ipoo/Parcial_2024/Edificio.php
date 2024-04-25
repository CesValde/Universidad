<?php 

class Edificio {
    private $direccion;
    private $colInmueble;
    private $objAdministrador;

    public function __construct($direccion, $colInmueble, $objAdministrador) {
        $this->direccion = $direccion;
        $this->colInmueble = $colInmueble;
        $this->objAdministrador = $objAdministrador;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getColInmueble() {
        return $this->colInmueble;
    }

    public function setColInmueble($colInmueble) {
        $this->colInmueble = $colInmueble;
    }

    public function getObjAdministrador() {
        return $this->objAdministrador;
    }

    public function setObjAdministrador($objAdministrador) {
        $this->objAdministrador = $objAdministrador;
    }

    public function darInmueblesDisponibles($tipoUso, $costoMaximo) {
        $colDisponibles = [] ;
        foreach($this -> getColInmueble() as $unInm) {
            if($unInm -> getObjInquilino() == null
                && $unInm -> getTipoUso() == $tipoUso 
                && $unInm -> getCostoMensual() <= $costoMaximo) {
                    $colDisponibles[] = $unInm ;
                } 
        }
        return $colDisponibles ;
    }

    public function buscarInmueble($inmueble) {
        $colInmuebles = $this -> getColInmueble();
        foreach($colInmuebles as $indice => $unInm) {
            if($unInm === $inmueble) {
                return $indice; 
            }
        }
        return $indice ; 
    }

    public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona) {
        $maxPiso = 0 ;
        $colInmuebles = $this -> getColInmueble() ;
        foreach($colInmuebles as $inmueble) {
            $numPiso = $inmueble -> getNumeroPiso() ;
            if($numPiso > $maxPiso) {
                $maxPiso = $numPiso ;
            }
        }
    
        for($piso = 1; $piso <= $maxPiso; $piso++) {
            $colDisponiblesPiso = [] ; 
            foreach($colInmuebles as $unInm) {
                if($unInm -> estaDisponible($tipoUso, $costoMaximo) && $unInm -> getNumeroPiso() === $piso) {
                    $colDisponiblesPiso[] = $unInm ;
                }
            }
            if(!empty($colDisponiblesPiso)) {
                return true ;
            }
        }
        return false ;
    }

    public function calculaCostoEdificio() {
        $costo = 0 ; 
        foreach($this -> getColInmueble() as $unInm) {
            if($unInm -> getObjInquilino() != null) {
                $costo += $unInm -> getCostoMensual() ; 
            }
        }
        return $costo ;
    }

    public function __toString() {
        return "Dirección: " . $this->direccion . "\n" .
               "Administrador: " . $this->objAdministrador . "\n" .
               "Cantidad de inmuebles: " . count($this->colInmueble);
    }
}