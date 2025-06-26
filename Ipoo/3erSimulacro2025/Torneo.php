<?php 

class Torneo {
    private $coleccPartidos;
    private $importePremio;

    public function __construct($importePremio) {
        $this->coleccPartidos = [];
        $this->importePremio = $importePremio;
    }

    public function getColeccPartidos() {
        return $this->coleccPartidos;
    }

    public function getImportePremio() {
        return $this->importePremio;
    }

    public function setImportePremio($importePremio) {
        $this->importePremio = $importePremio;
    }
    public function setColeccPartidos($coleccPartidos) {
        $this->coleccPartidos = $coleccPartidos;
    }

    /**
     * Recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se trata de un partido de futbol o basquetbol. 
     * El método debe crear y retornar la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo. 
     * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.
     * @param object
     * @param object
     * @param string
     * @param string
     * @return object
     * @return null
     */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) {
        $partido = null ;
        $coleccPartidos = $this->getColeccPartidos();

        if($OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores()
            && 
            $OBJEquipo1->getCategoria() == $OBJEquipo2->getCategoria()      // como evaluo que son iguales? por id o descripcion? 
            &&
            $OBJEquipo1 !== $OBJEquipo2 
        ){ 
            $idPartido = count($this-> getColeccPartidos()) + 1;
            if($tipoPartido == 'futbol'){
                $partido = new PartidoFutbol($idPartido, $fecha, 0, 0, $OBJEquipo1, $OBJEquipo2, $OBJEquipo1->getCategoria()) ;     // seteo los goles en 0??
                $coleccPartidos[] = $partido;
                $this->setColeccPartidos($coleccPartidos);
            } else {
                $partido = new PartidoBasket($idPartido, $fecha, 0, 0, $OBJEquipo1, $OBJEquipo2, 0) ;     // seteo infracciones en 0 ?
                $coleccPartidos[] = $partido;
                $this->setColeccPartidos($coleccPartidos);
            }
        }  
        return $partido;
    }

    /**
     * Recibe por parámetro si se trata de un partido de fútbol o de básquetbol y en base al parámetro busca entre esos partidos los equipos ganadores (equipo con mayor cantidad de goles). 
     * El método retorna una colección con los objetos de los equipos encontrados.
     * @param string
     * @return array
     */
    public function darGanadores($deporte) {
        $coleccGanadores = [] ;
        
        foreach($this->getColeccPartidos() as $partido) {
            if(is_a($partido, "PartidoFutbol") && $deporte == 'futbol') {
                $ganador = $partido->darEquipoGanador();
                $coleccGanadores[] = $ganador;
            } elseif(is_a($partido, "PartidoBasket") && $deporte == 'basket') {
                $ganador = $partido->darEquipoGanador();
                $coleccGanadores[] = $ganador;
            }
        }
        return $coleccGanadores ;
    }

    /**
     * Retorna un arreglo asociativo donde una de sus claves es ‘equipoGanador’ y contiene la referencia al equipo ganador
     * Y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. 
     * @param object
     * @return array
     */
    public function calcularPremioPartido($OBJPartido) {
        $descripGanador = [] ;
        $ganador = $OBJPartido->darEquipoGanador();

        if(is_array($ganador)) {
            // retorno null o muestro los dos equipos con la mitad de premio ?
            $descripGanador = null ;
            /* foreach($ganador as $ganadorAux) {
                $descripGanador["equipoGanador"] = $ganadorAux->getNombre() ;
                $descripGanador["premioPartido"] = ($OBJPartido->coeficientePartido() * $this->getImportePremio()) / 2;
            } */ 
        } else {
            $descripGanador["equipoGanador"] = $ganador->getNombre() ;
            $descripGanador["premioPartido"] = $OBJPartido->coeficientePartido() * $this-> getImportePremio();
        }
        return $descripGanador;
    }

    public function __toString() {
        $infoPartidos = "";
        foreach ($this->getColeccPartidos() as $index => $partido) {
            $infoPartidos .= "Partido " . ($index + 1) . ": " . $partido . "\n";
        }
        return 
            "Importe del Premio: $" . $this->getImportePremio() . "\n" .
            "Colección de Partidos:\n" . ($infoPartidos ?: "No hay partidos cargados.\n");
    }
}