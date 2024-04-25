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

    /* agregado */
    public function alquilar($obj) {
        if($this -> getObjInquilino() == null) {
            $this -> setObjInquilino($obj) ;
            return true ;
        }
        return false ; 
    }

    public function estaDisponible($tipouso, $costoMaximo) {
        if($this->objInquilino == null) {
            if($this->tipoUso == $tipouso || $this->costoMensual < $costoMaximo) {
                return true ;
            }
            return false ;
        }
    }

    public function __toString() {
        $alquilado = $this->estaAlquilado() ? "Sí" : "No";
        return "Código de referencia: " . $this->codigoReferencia . "\n" .
               "Número de piso: " . $this->numeroPiso . "\n" .
               "Tipo de uso: " . $this->tipoUso . "\n" .
               "Costo mensual: " . $this->costoMensual . "\n" .
               "¿Está alquilado?: " . $alquilado;
    }
}