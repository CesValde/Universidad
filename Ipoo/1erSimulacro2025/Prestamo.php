<?php 

class Prestamo {
    private $identificacion;
    private $fechaOtorgamiento;
    private $monto;
    private $cantCuotas;
    private $tasaInteres;
    private $coleccionCuotas; 
    private $persona; // Referencia a Persona

    public function __construct(
        $identificacion, 
        $monto, 
        $cantCuotas, 
        $tasaInteres, 
        $persona
    ) {
        $this->identificacion = $identificacion;
        $this->fechaOtorgamiento = null;
        $this->monto = $monto;
        $this->cantCuotas = $cantCuotas;
        $this->tasaInteres = $tasaInteres;
        $this->coleccionCuotas = [] ;
        $this->persona = $persona;
        
    }

    public function getIdentificacion() {
        return $this->identificacion;
    }
    public function getFechaOtorgamiento() {
        return $this->fechaOtorgamiento;
    }
    public function getMonto() {
        return $this->monto;
    }
    public function getCantidadDeCuotas() {
        return $this->cantCuotas;
    }
    public function getTasaInteres() {
        return $this->tasaInteres;
    }
    public function getColeccionCuotas() {
        return $this->coleccionCuotas;
    }
    public function getPersona() {
        return $this->persona;
    }

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }
    public function setFechaOtorgamiento($fechaOtorgamiento) {
        $this->fechaOtorgamiento = $fechaOtorgamiento;
    }
    public function setMonto($monto) {
        $this->monto = $monto;
    }
    public function setCantidadDeCuotas($cantCuotas) {
        $this->cantCuotas = $cantCuotas;
    }
    public function setTasaInteres($tasaInteres) {
        $this->tasaInteres = $tasaInteres;
    }
    public function setPersona($persona) {
        $this->persona = $persona;
    }
    public function setColeccionCuotas($coleccionCuotas) {
        $this->coleccionCuotas = $coleccionCuotas;
    }

    /** 
        Recibe por parámetro el numero de la cuota y calcula el importe del interés sobre el saldo deudor.
    */
     private function calcularInteresPrestamo($numCuota) {
        $tasaInteres = $this -> getTasaInteres() ;
        $monto = $this -> getMonto() ;
        $cantCuotas = $this -> getCantidadDeCuotas() ;

        $montoInteres = ($monto - (($monto / $cantCuotas) * ($numCuota - 1))) * $tasaInteres;
        return $montoInteres ;
    }

    /** 
        setea la variable instancia  fecha otorgamiento, con la fecha actual, y genera cada una de las cuotas dependiendo el valor almacenado en la variable instancia  “cantCuotas” y "monto"
    */
    public function otorgarPrestamo() {
        $coleccionCuotas = $this -> getColeccionCuotas() ;
        $fechaOtorgamiento = date("Y-m-d") ;
        $this -> setFechaOtorgamiento($fechaOtorgamiento);
        $cantCuotas = $this -> getCantidadDeCuotas() ;
        $monto = $this -> getMonto() ;
        $numCuota = 1 ; 
        $montoCuota = $monto / $cantCuotas ;

        for($i=1 ; $i<=$cantCuotas ; $i++) {
            $montoInteres = $this -> calcularInteresPrestamo($numCuota) ; 
            $cuota = new Cuota($i, $montoCuota, $montoInteres);
            $coleccionCuotas[] = $cuota ;
            $numCuota++ ;
        }
        $this -> setColeccionCuotas($coleccionCuotas) ;
    }

    /** 
        retorna la referencia a la siguiente cuota que debe ser abonada de un préstamo, si el préstamo tiene todas sus cuotas canceladas retorna null.
    */ 
     public function darSiguienteCuotaPagar() {
        $coleccionCuotas = $this -> getColeccionCuotas() ;
        $i = 0 ;
        $cuota = null ;

        while($i<count($coleccionCuotas) && $cuota === null) {
            $cancelada = $coleccionCuotas[$i] -> getCancelada() ;
            if($cancelada == false) {
                $cuota = $coleccionCuotas[$i] ;
            }
            $i++ ;
        }
        return $cuota ;
    }

    public function __toString() {
        $cadenaCuota = "Detalle de la Cuota: \n";
        foreach ($this->getColeccionCuotas() as $cuota) {
            $cadenaCuota .= "\n" . $cuota ;
        }

        return 
        "Identificación: " . $this->getIdentificacion() . "\n" .
        "Fecha de Otorgamiento: " . $this->getFechaOtorgamiento() . "\n" .
        "Monto: $" . $this->getMonto() . "\n" .
        "Cantidad de Cuotas: " . $this->getCantidadDeCuotas() . "\n" .
        "Tasa de Interés: " . ($this->getTasaInteres() * 100) . "%\n" .
        $cadenaCuota . "\n" .
        "Persona:\n" . $this->getPersona() . "\n";
    }
}