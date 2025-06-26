<?php

class Partido {
    private $idPartido;
    private $fecha;
    private $cantGolesE1;
    private $cantGolesE2;
    private $equipo1;
    private $equipo2;
    private $coeficiente;

    public function __construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2, $equipo1, $equipo2, $coeficiente = 0.5) {
        $this->idPartido = $idPartido;
        $this->fecha = $fecha;
        $this->cantGolesE1 = $cantGolesE1;
        $this->cantGolesE2 = $cantGolesE2;
        $this->equipo1 = $equipo1;
        $this->equipo2 = $equipo2;
        $this->coeficiente = $coeficiente;
    }

    public function getIdPartido() {
        return $this->idPartido;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getCantGolesE1() {
        return $this->cantGolesE1;
    }
    public function getCantGolesE2() {
        return $this->cantGolesE2;
    }
    public function getCoeficiente() {
        return $this->coeficiente;
    }
    public function getEquipo1() {
        return $this->equipo1;
    }
    public function getEquipo2() {
        return $this->equipo2;
    }

    public function setIdPartido($idPartido) {
        $this->idPartido = $idPartido;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setCantGolesE1($cantGolesE1) {
        $this->cantGolesE1 = $cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2) {
        $this->cantGolesE2 = $cantGolesE2;
    }
    public function setCoeficiente($coeficiente) {
        $this->coeficiente = $coeficiente;
    }
    public function setEquipo1($equipo1) {
        $this->equipo1 = $equipo1;
    }
    public function setEquipo2($equipo2) {
        $this->equipo2 = $equipo2;
    }

    /**
     * Retorna el equipo ganador de un partido (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos
     * @return object
     * @return array
     */
    public function darEquipoGanador() {
        if($this-> getCantGolesE1() > $this-> getCantGolesE2()) {
            $ganador = $this-> getEquipo1();
        } elseif($this-> getCantGolesE2() > $this-> getCantGolesE1()) {
            $ganador = $this-> getEquipo2();
        } else {
            $ganador = [$this->getEquipo1(), $this->getEquipo2()];
        }
        return $ganador;
    }

    /**
     * Retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * @return float
     */
    public function coeficientePartido() {
        $coeficiente = $this-> getCoeficiente() * (($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getEquipo1()->getCantJugadores() + $this->getEquipo2()->getCantJugadores())) ;
        return $coeficiente;
    }

    public function __toString() {
        return 
        "ID de Partido: " . $this->getIdPartido() . "\n" .
        "Fecha: " . $this->getFecha() . "\n" .
        "Goles Equipo 1: " . $this->getCantGolesE1() . "\n" .
        "Goles Equipo 2: " . $this->getCantGolesE2() . "\n" .
        "Coeficiente: " . $this->getCoeficiente() . "\n".
        "Equipo 1: \n" . $this->getEquipo1() . "\n" .
        "Equipo 2: \n" . $this->getEquipo2(). "\n" .
        "Coeficiente: ". $this-> getCoeficiente();
    }
}