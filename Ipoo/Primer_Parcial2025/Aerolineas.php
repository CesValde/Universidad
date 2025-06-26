<?php 

class Aerolineas {
    private $identificacion;
    private $nombre;
    private $coleccVuelos; 

    public function __construct($identificacion, $nombre, $coleccVuelos) {
        $this->identificacion = $identificacion;
        $this->nombre = $nombre;
        $this->coleccVuelos = $coleccVuelos;
    }

    public function getIdentificacion() {
        return $this->identificacion;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getColeccVuelos() {
        return $this->coleccVuelos;
    }

    public function setIdentificacion($identificacion) {
        $this->identificacion = $identificacion;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setColeccVuelos($coleccVuelos) {
        $this->coleccVuelos = $coleccVuelos;
    }

    /** 
        recibe por parámetro un destino junto a una cantidad de asientos libres y se debe retornar una colección con los vuelos disponibles a ese destino.
    */
    public function darVueloADestino($destino, $cantAsientos) {
        $coleccVuelos = $this -> getColeccVuelos() ;

        foreach($coleccVuelos as $vuelo) {
            $destinoBuscado = $vuelo -> getDestino() ;
            $cantAsientosDispo = $vuelo -> getAsientosDisponibles() ;
            if($destino == $destinoBuscado && $cantAsientos <= $cantAsientosDispo) {
                $coleccVuelosDispo[] = $vuelo ;
            }
        }
        return $coleccVuelosDispo ; 
    }


    /** 
        Recibe como parámetro un vuelo, "verifica que no se encuentre registrado ningún otro vuelo al mismo destino, en la misma fecha y con el mismo horario de partida".
        El método debe retornar verdadero si la incorporación del vuelo se realizó correctamente y falso en caso contrario.
    */ 
    public function incorporarVuelo($vuelo) {
        $coleccVuelos = $this -> getColeccVuelos() ; 
        $incorpora = true ;
        $i = 0 ;
        $horaPartidaVuelo = $vuelo -> getHoraPartida();
        $fechaPartidaVuelo = $vuelo -> getFecha();

        while($i < count($coleccVuelos) && $incorpora == true) {
            $vuelos = $coleccVuelos[$i];
            $fechaPartidaVuelos = $vuelos -> getFecha();
            $horaPartidaVuelos = $vuelos -> getHoraPartida();
            if(
                $vuelos -> getDestino() == $vuelo -> getDestino() 
                &&
                $fechaPartidaVuelos == $fechaPartidaVuelo
                &&
                $horaPartidaVuelo == $horaPartidaVuelos
            ) {
                $incorpora = false ;
            }
            $i++ ;
        }

        if($incorpora) {
            $coleccVuelos[] = $vuelo ;
            $this -> setColeccVuelos($coleccVuelos) ;
        }

        return $incorpora ;
    }


    /** 
        Realiza la venta con el primer vuelo encontrado a ese destino, con los asientos disponibles y en la fecha deseada.  
    */
    public function venderVueloADestino($cantAsientos, $destino, $fecha) {
        $coleccVuelos = $this -> getColeccVuelos(); 
        $i = 0 ; 
        $ventaViaje = null ; 

        while($i<count($coleccVuelos) && $ventaViaje == null) {
            $vuelo = $coleccVuelos[$i] ; 
            $fechaPartidaVuelo = $vuelo -> getFecha();

            if($vuelo -> getDestino() == $destino && $fecha == $fechaPartidaVuelo) {
                $respuesta = $vuelo -> asignarAsientosDisponibles($cantAsientos) ;
                    if($respuesta) {
                        $ventaViaje = $vuelo ; 
                    }
            }
        }
        return $ventaViaje ; 
    }

    /** 
        retorna el importe promedio recaudado por la aerolínea con cada uno de sus vuelos
    */
    public function montoPromedioRecaudado() {
        $coleccVuelos = $this -> getColeccVuelos() ; 
        $promedioImporViajes = 0 ;
        $cantVuelos = count($coleccVuelos) ;
        $importeTotal = 0 ;

        if($cantVuelos > 0) {
            foreach($coleccVuelos as $vuelo) {
                $importeViaje = $vuelo -> getImporte() ;
                $importeTotal = $importeTotal + $importeViaje ;
            }
            $promedioImporViajes = $importeTotal / $cantVuelos ;
        }
        return $promedioImporViajes ;
    }

    public function __toString() {
        $infoVuelos = "";
        foreach ($this->coleccVuelos as $vuelo) {
            $infoVuelos .= $vuelo . "\n";
        } 

        return 
            "Identificación: " . $this->getIdentificacion() . "\n" .
            "Nombre de la aerolínea: " . $this->getNombre() . "\n" .
            "Colección de Vuelos:\n" . ($infoVuelos ? $infoVuelos : "No hay vuelos programados.\n");
    }
} 