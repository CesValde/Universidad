<?php 

class RegistroVehiculo {
    private $patente;

    public function __construct($patente) {
        $this->patente = $patente;
    }

    public function getPatente() {
        return $this->patente;
    }
    public function setPatente($patente) {
        $this->patente = $patente;
    }

    /**
     * calcula y retorna el valor final a pagar por un vehículo. 
     */
    public function calcularPeaje() {
        $valorBase = 20; 
        return $valorBase;
    }

    public function __toString() {
        return "\n".
        "Patente: ".$this->getPatente()."\n";
    }
}