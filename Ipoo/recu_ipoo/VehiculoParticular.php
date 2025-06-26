<?php 

class VehiculoParticular extends RegistroVehiculo {
    public function __construct($patente) {
        parent::__construct($patente);
    }

    /**
     * calcula y retorna el valor final a pagar por un vehículo. 
     */
    public function calcularPeaje() {
        $total = parent::calcularPeaje();
        return $total;
    }

    public function __toString() {
        return parent::__toString();
    }
}
