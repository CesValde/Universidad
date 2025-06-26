<?php

class Aeropuerto {
    private $denominacion;
    private $direccion;
    private $coleccAerolineas;

    public function __construct($denominacion, $direccion, $coleccAerolineas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->coleccAerolineas = $coleccAerolineas; 
    }

    public function getDenominacion() {
        return $this->denominacion;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getColeccAerolineas() {
        return $this->coleccAerolineas;
    }

    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setColeccAerolineas($coleccAerolineas) {
        $this->coleccAerolineas = $coleccAerolineas;
    }

    /** 
        recibe por parámetro una aerolínea y retorna todos los vuelos asignados a esa aerolínea.
    */ 
    public function retornarVuelosAerolinea($aerolinea) {
        $coleccVuelos = $aerolinea -> getColeccVuelos() ;
        
        return $coleccVuelos;
    }

    /** 
        recibe por parámetro la cantidad de asientos, una fecha y un destino y el aeropuerto realiza automáticamente la asignación al vuelo. 
    */
    public function ventaAutomatica($cantAsientos, $fecha, $destino) {
        $coleccAerolineas = $this -> getColeccAerolineas() ; 
        $i = 0 ;
        $vueloEncontrado = false ; 
        $vueloVendido = null ;

        while($i<count($coleccAerolineas) && $vueloEncontrado == false) {
            $aerolinea = $coleccAerolineas[$i] ;
            $coleccVuelos = $aerolinea -> getColeccVuelos() ;
            $coleccVuelos = $aerolinea -> darVueloADestino($destino, $cantAsientos) ;
            // si la coleccion no esta vacia se recorre el array
            if(!empty($coleccVuelos)) {
                $j=0 ;
                while($j < count($coleccVuelos) && $vueloEncontrado == false) {
                    $vuelo = $coleccVuelos[$j] ;
                    $fechaVuelo = $vuelo -> getFecha();
                    if($fechaVuelo == $fecha) {
                        $respuesta = $vuelo -> asignarAsientosDisponibles($cantAsientos) ;
                        if($respuesta) {
                            $vueloEncontrado = true ; 
                            $vueloVendido = $vuelo ;
                        }
                    }
                    $j++ ;
                }
            }
           $i++ ;
        }
        return $vueloVendido ; 
    }

    /** 
        Recibe por parámetro la identificación de una Aerolínea y retorna el promedio de lo recaudado por esa Aerolínea en ese Aeropuerto. 
        Para la implementación utilizar, si es posible, alguno de los métodos previamente implementado.
    */
    public function promedioRecaudadoXAerolinea($identificacion) {
        $coleccAerolineas = $this -> getColeccAerolineas() ;
        $promeImporAerolinea = 0 ;
        $i = 0 ;
        $esIgual = false ;
        
        while($i < count($coleccAerolineas) && $esIgual == false) {
            $aerolinea = $coleccAerolineas[$i] ;
            if($identificacion == $aerolinea -> getIdentificacion()) {
                $promeImporAerolinea = $aerolinea -> montoPromedioRecaudado() ;
                $esIgual = true;
            }
            $i++ ;
        }
        return $promeImporAerolinea ;
    }

    public function __toString() {
        $cadena = "" ;
        foreach($this->getColeccAerolineas() as $aerolinea) {
            $cadena .= $aerolinea . "\n";
        }

        return 
            "Denominación: " . $this->getDenominacion() . "\n" .
            "Dirección: " . $this->getDireccion() . "\n" .
            "Aerolíneas:\n" . $cadena ;
    }
}