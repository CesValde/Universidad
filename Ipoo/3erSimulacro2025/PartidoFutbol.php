<?php

class PartidoFutbol extends Partido {
    public function __construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2, $equipo1, $equipo2) {
        parent::__construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2, $equipo1, $equipo2);
    }

    /**
     * Retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. 
     * Calculamos con el coeficiente de categoria
     * @return float
     */
    public function coeficientePartido() {
        switch(strtolower($this->getEquipo1()->getCategoria()->getDescripcion())) {     // descripcion trae el tipo de categoria? 
            case "menores":
                $coeficiente = 0.13;
            case "juveniles":
                $coeficiente = 0.19;
            case "mayores":
                $coeficiente = 0.27;
        }
        $coeficiente = $coeficiente * (($this->getCantGolesE1() + $this->getCantGolesE2()) * ($this->getEquipo1()->getCantJugadores() + $this->getEquipo2()->getCantJugadores())) ;
        return $coeficiente;
    }

    public function __toString() {
        return "Partido de Fútbol\n" . parent::__toString();
    }
}