<?php 

class Inmueble {
    private $codigoReferencia;
    private $numeroPiso;
    private $tipoUso;
    private $costoMensual;
    private $objInquilino;

    public function __construct($codigoReferencia, $numeroPiso, $tipoUso, $costoMensual, $objInquilino = null) {
        $this->codigoReferencia = $codigoReferencia;
        $this->numeroPiso = $numeroPiso;
        $this->tipoUso = $tipoUso;
        $this->costoMensual = $costoMensual;
        $this->objInquilino = $objInquilino;
    }

    public function getCodigoReferencia() {
        return $this->codigoReferencia;
    }

    public function getNumeroPiso() {
        return $this->numeroPiso;
    }

    public function getTipoUso() {
        return $this->tipoUso;
    }

    public function getCostoMensual() {
        return $this->costoMensual;
    }

    public function getObjInquilino() {
        return $this->objInquilino;
    }

    public function setObjInquilino($objInquilino) {
        $this->objInquilino = $objInquilino;
    }

    public function estaAlquilado() {
        return $this->objInquilino !== null;
    }

    /* 
        recibe por parámetro la referencia al nuevo inquilino del inmueble. Tener en cuenta que un 
        inmueble sólo puede ser alquilado si no se encuentra alquilado en ese momento.  
    */
    public function alquilar($obj) {
        $alquilado = false ;
        if($this -> getObjInquilino() == null) {
            $this -> setObjInquilino($obj) ;
            $alquilado = true ;
        }
        return $alquilado ; 
    }

    /* 
        recibe como parámetro el tipo de uso que se requiere y el monto máximo disponible para alquilar 
        y determine si el inmueble está disponible o no. Tener en cuenta que un inmueble sólo puede 
        ser alquilado si no se encuentra alquilado en ese momento
    */
    public function estaDisponible($tipouso, $costoMaximo) {
        $objInquilino = $this -> getObjInquilino() ;
        $tipo = $this -> getTipoUso() ;
        $costoMensual = $this -> getCostoMensual() ;
        $disponible = false ;

        if($objInquilino == null) {
            if($tipo == $tipouso && $costoMensual < $costoMaximo) {
                $disponible = true ;
            }
            return $disponible ;
        }
    }

    public function __toString() {
        $alquilado = $this->estaAlquilado() ? "Sí" : "No";
        return "Código de referencia: " . $this->getCodigoReferencia() . "\n" .
               "Número de piso: " . $this->getNumeroPiso() . "\n" .
               "Tipo de uso: " . $this->getTipoUso() . "\n" .
               "Costo mensual: " . $this->getCostoMensual() . "\n" .
               "¿Está alquilado?: " . $alquilado;
    }
}