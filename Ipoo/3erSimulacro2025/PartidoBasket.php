<?php

class PartidoBasket extends Partido {
    private $infracciones;

    public function __construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2, $equipo1, $equipo2, $infracciones) {
        parent::__construct($idPartido, $fecha, $cantGolesE1, $cantGolesE2, $equipo1, $equipo2);
        $this->infracciones = $infracciones;
    }

    public function getInfracciones() {
        return $this->infracciones;
    }

    public function setInfracciones($infracciones) {
        $this->infracciones = $infracciones;
    }

    /**
     * Retorna el valor obtenido por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores.
     * Calculamos el coeficiente con las infracciones
     * @return float
     */
    public function coeficientePartido() {
        $coeficiente = parent::coeficientePartido();
        $coeficiente = $coeficiente - (0.75 * $this->getInfracciones());
        return $coeficiente;
    }

    public function __toString() {
        return 
        parent::__toString() . "\n" .
        "Infracciones: " . $this->getInfracciones();
    }
}