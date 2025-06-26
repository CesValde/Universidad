<?php 

class TransporteEscolar extends RegistroVehiculo {
    private $capacidadMaxima;

    public function __construct($patente, $capacidadMaxima) {
        parent::__construct($patente);
        $this->capacidadMaxima = $capacidadMaxima;
    }

    public function getCapacidadMaxima() {
        return $this->capacidadMaxima;
    }
    public function setCapacidadMaxima($capacidadMaxima) {
        $this->capacidadMaxima = $capacidadMaxima;
    }

    /**
     * calcula y retorna el valor final a pagar por un vehículo. 
     */
    public function calcularPeaje() {
        $valorBase = 25;
        $total = 0;
        $total = $valorBase + ($valorBase * $this->getCapacidadMaxima());
        return $total;
    }

    public function __toString() {
        return parent::__toString()."\n".
        "Capacidad Maxima: ". $this->getCapacidadMaxima();
    }
}
