<?php 

class Cuota {
    private $numero;
    private $montoCuota;
    private $montoInteres;
    private $cancelada;

    public function __construct($numero, $montoCuota, $montoInteres) {
        $this->numero = $numero;
        $this->montoCuota = $montoCuota;
        $this->montoInteres = $montoInteres;
        $this->cancelada = false;
    }

    public function getNumero() {
        return $this -> numero;
    }
    public function getMontoCuota() {
        return $this -> montoCuota;
    }
    public function getMontoInteres() {
        return $this -> montoInteres;
    }
    public function getCancelada() {
        return $this -> cancelada;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function setMontoCuota($montoCuota) {
        $this->montoCuota = $montoCuota;
    }
    public function setMontoInteres($montoInteres) {
        $this->montoInteres = $montoInteres;
    }
    public function setCancelada($cancelada) {
        $this->cancelada = $cancelada;
    }

    /** 
        retorna el importe total de la cuota mas los intereses que deben ser aplicados
    */
     public function darMontoFinalCuota() {
        $montoCuota = $this -> getMontoCuota() ; 
        $intereses = $this -> getMontoInteres() ; 
        $totalCuota = 0 ;

        $totalCuota = $montoCuota + ($montoCuota * $intereses) ; 
        return $totalCuota ; 
    }

    public function __toString() {
        return 
            "Número de cuota: " . $this->getNumero() . "\n" .
            "Monto de la cuota: $" . $this->getMontoCuota() . "\n" .
            "Monto de interés: $" . $this->getMontoInteres() . "\n" .
            "Está cancelada?: " . ($this->getCancelada() ? "Sí" : "No") . "\n";
    }
}