<?php 

class Camion extends RegistroVehiculo {
    private $peso;
    private $cantidadEjes;

    public function __construct($patente, $peso, $cantidadEjes) {
        parent::__construct($patente);
        $this->peso = $peso;
        $this->cantidadEjes = $cantidadEjes;
    }

    public function getPeso() {
        return $this->peso;
    }
    public function getCantidadEjes() {
        return $this->cantidadEjes;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }
    public function setCantidadEjes($cantidadEjes) {
        $this->cantidadEjes = $cantidadEjes;
    }

    /**
     * calcula y retorna el valor final a pagar por un vehículo. 
     */
    public function calcularPeaje() {
        $total = 0;
        $valorBase = parent::calcularPeaje();
        $porEje = 100 * $this->getCantidadEjes();
        $porPeso = 15 * ($this->getPeso() / 1000 );
        $subtotal = $valorBase + $porEje + $porPeso;

        if($this->getPeso() < 5) {
            $impuesto = $subtotal * 0.02;
        } else {
            $impuesto = $subtotal * 0.05;
        }
        $total = $subtotal + $impuesto;
        return $total ;
    }

    public function __toString() {
        return parent::__toString().
        "Peso: ". $this->getPeso()."\n".
        "Cantidad de ejes: ". $this->getCantidadEjes();
    }
}