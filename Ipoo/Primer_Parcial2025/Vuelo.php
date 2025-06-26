<?php 

class Vuelo {
    private $numero;
    private $importe;
    private $fecha;
    private $destino;
    private $horaArribo;
    private $horaPartida;
    private $asientosTotales;
    private $asientosDisponibles;
    private $responsable; 

    public function __construct($numero, $importe, $fecha, $destino, $horaArribo, $horaPartida, $asientosTotales, $asientosDisponibles, $responsable) {
        $this->numero = $numero;
        $this->importe = $importe;
        $this->fecha = $fecha;
        $this->destino = $destino;
        $this->horaArribo = $horaArribo;
        $this->horaPartida = $horaPartida;
        $this->asientosTotales = $asientosTotales;
        $this->asientosDisponibles = $asientosDisponibles;
        $this->responsable = $responsable;
    }

    public function getNumero() {
        return $this->numero;
    }
    public function getImporte() {
        return $this->importe;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getHoraArribo() {
        return $this->horaArribo;
    }
    public function getHoraPartida() {
        return $this->horaPartida;
    }
    public function getAsientosTotales() {
        return $this->asientosTotales;
    }
    public function getAsientosDisponibles() {
        return $this->asientosDisponibles;
    }
    public function getResponsable() {
        return $this->responsable;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
    public function setImporte($importe) {
        $this->importe = $importe;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setDestino($destino) {
        $this->destino = $destino;
    }
    public function setHoraArribo($horaArribo) {
        $this->horaArribo = $horaArribo;
    }
    public function setHoraPartida($horaPartida) {
        $this->horaPartida = $horaPartida;
    }
    public function setAsientosTotales($asientosTotales) {
        $this->asientosTotales = $asientosTotales;
    }
    public function setAsientosDisponibles($asientosDisponibles) {
        $this->asientosDisponibles = $asientosDisponibles;
    }
    public function setResponsable($responsable) {
        $this->responsable = $responsable;
    }


    /**
        recibe por parámetros la cantidad de asientos que desean asignarse y de ser necesario actualizando la información del vuelo.
        El método retorna verdadero en caso que la asignación puedo concretarse y falso en caso contrario.
    */ 
    public function  asignarAsientosDisponibles($cantPasajeros) {
        $respuesta = false ;
        $asientosDisponibles = $this -> getAsientosDisponibles() ;

        if($cantPasajeros <= $asientosDisponibles) {
            $respuesta = true ;
            $asientosDisponibles = $asientosDisponibles - $cantPasajeros ;
            $this -> setAsientosDisponibles($asientosDisponibles) ;
        }
        return $respuesta ;
    }

    public function __toString() {
        return 
            "Número de vuelo: " . $this->getNumero() . "\n" .
            "Importe: $" . $this->getImporte() . "\n" .
            "Fecha: " . $this->getFecha() . "\n" .
            "Destino: " . $this->getDestino() . "\n" .
            "Hora de arribo: " . $this->getHoraArribo() . "\n" .
            "Hora de partida: " . $this->getHoraPartida() . "\n" .
            "Asientos totales: " . $this->getAsientosTotales() . "\n" .
            "Asientos disponibles: " . $this->getAsientosDisponibles() . "\n" .
            "Responsable del vuelo:\n" . $this->getResponsable();
    }
}