<?php

class Financiera {
    private $denominacion;
    private $direccion;
    private $coleccionPrestamos;

    public function __construct($denominacion, $direccion, $coleccionPrestamos) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccionPrestamos = $coleccionPrestamos;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColeccionPrestamos() {
        return $this->coleccionPrestamos;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setColeccionPrestamos($coleccionPrestamos) {
        $this->coleccionPrestamos = $coleccionPrestamos;
    }

    /** 
        recibe por parámetro un nuevo préstamo.
    */
     public function incorporarPrestamo($prestamo) {
        $coleccionPrestamos = $this -> getColeccionPrestamos() ; 
        array_push($coleccionPrestamos, $prestamo) ;
        $this -> setColeccionPrestamos($coleccionPrestamos) ;
    }

    /** 
        recorre la lista de préstamos que no han sido generadas sus cuotas. Por cada préstamo, se corrobora que su monto dividido 
        la cantidad_de_cuotas no supere el 40 % del neto del solicitante, si la verificación es satisfactoria se invoca al 
        método otorgarPrestamo. 
    */
    public function otorgarPrestamoSiCalifica() {
        $coleccionPrestamos = $this -> getColeccionPrestamos() ; 

        foreach($coleccionPrestamos as $prestamo) { 
            $monto = $prestamo -> getMonto() ;
            $cantCuotas = $prestamo -> getCantidadDeCuotas() ;
            $porcentaje = 0.40 ;
            $monto = $monto / $cantCuotas ; 
            $montoPorcentaje = $monto * $porcentaje;
            $neto = $prestamo -> getPersona() -> getNeto() ;
            if($montoPorcentaje < $neto) {
                $prestamo -> otorgarPrestamo() ; 
            }
        }
    }

    /** 
        Recibe por parámetro la identificación del préstamo, se busca el préstamo en la colección de prestamos y si es encontrado se obtiene la siguiente cuota a pagar. 
        El método debe retornar la referencia a la cuota. Utilizar para su implementación el método darSiguienteCuotaPagar 
    */
    public function informarCuotaPagar($idPrestamo) {
        $coleccionPrestamos = $this -> getColeccionPrestamos() ;
        $i = 0;
        $encontrado = false ;
        $cuota = null ;

        while($i<count($coleccionPrestamos) && $encontrado == false) {
            if($idPrestamo == $coleccionPrestamos[$i] -> getIdentificacion()) {
                $cuota = $coleccionPrestamos[$i] -> darSiguienteCuotaPagar() ;
            }
            $i++ ;
        }
        return $cuota ;
    }

    public function __toString() {
        $cadenaPrestamo = "Coleccion Prestamos: \n" ;
        foreach($this->getColeccionPrestamos() as $prestamo) {
            $cadenaPrestamo .= $prestamo -> __toString() . "\n" ;
        }

        return 
        "Denominación: " . $this->getDenominacion() . "\n" .
        "Dirección: " . $this->getDireccion() . "\n" .
        $cadenaPrestamo ; 
    }
}