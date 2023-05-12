<?php 

    class Viaje {

        // $coleccionPasajeros 
        // $coleccionVentas 
        // $cantMaxPasajeros
        // $ida = boolean
        // $vuelta = boolean


        private $codigoViaje ; 
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $coleccPasajeros ;  
        private $responsableV ; 

        // agrego nuevos atributos
        private $ida ;          // podria ir en clase venta
        private $vuelta ;       // podria ir en clase venta
        // precioTicket 
        // coleccVentas 

        public function __construct(
            $codigoViaje, 
            $destino, 
            $cantMaxPasajeros,
            // coleccion de objetos, los objetos son pasajeros 
            $coleccPasajeros, 
            $responsableV, 
            $ida, 
            $vuelta
        ) {
            $this -> codigoViaje = $codigoViaje ; 
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> coleccPasajeros = $coleccPasajeros ; 
            $this -> responsableV = $responsableV ;
            $this -> ida = $ida ; 
            $this -> vuelta = $vuelta ; 
        }

        // obetener los datos 
        public function getCodigoViaje() {
            return $this -> codigoViaje ; 
        }
        public function getDestino() {
            return $this -> destino ; 
        }
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros ; 
        }
        public function getColeccPasajeros() {
            return $this -> coleccPasajeros ; 
        }
        public function getResponsableV() {
            return $this -> responsableV ; 
        }
        public function getIda() {
            return $this -> ida ; 
        }
        public function getVuelta() {
            return $this -> vuelta ; 
        }

        // asignamos los valores 
        public function setCodigoViaje($codigoViaje) {
            $this -> codigoViaje = $codigoViaje ; 
        }
        public function setDestino($destino) {
            $this -> destino = $destino ;   
        }
        public function setCantMaxPasajeros($cantMaxPasajeros) {
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
        }
        public function setColeccPasajeros($coleccPasajeros) {
            $this -> coleccPasajeros = $coleccPasajeros ; 
        }
        public function setResponsableV($responsableV) {
            $this -> responsableV = $responsableV ; 
        }
        public function setIda($ida) {
            $this -> ida = $ida ; 
        }
        public function setVuelta($vuelta) {
            $this -> vuelta = $vuelta ; 
        }

        public function venderPasaje($pasajero) {
            $sillaRuedas = $pasajero -> getSillaRuedas() ;
            $asistencia = $pasajero -> getAsistencia() ;
            $comida = $pasajero -> getComida() ;
            $coleccPasajeros = $this -> getColeccPasajeros() ; 
            $cantPasajeros = count($coleccPasajeros) ; 
            echo $cantPasajeros ; 

            $disponible = $this -> hayPasajeDisponible($cantPasajeros) ;
                if($disponible) {
                    // objeto $coleccVentas aqui muy posiblemente
                    if($sillaRuedas) {
                        if($asistencia) {
                            if($comida) {
                                // incrementar 30%
                            }
                        } if($comida) {
                            // incrementa 15%
                        } else {
                           // incrementa 15%
                        }
                    } elseif($asistencia) { 
                        if($comida) {
                            // incrementa 15%
                        } else {
                            // incrementa 15%
                        }
                    } else {
                         // incrementa 15%
                    }
                } else {
                    $importe = 0 ;
                }

                // if de si tiene ida y vuelta agg el 50%

            return $importe ; 
        }

        public function hayPasajeDisponible($cantPasajeros) {
            $cantMaxPasajeros = $this -> getCantMaxPasajeros() ; 

                if($cantPasajeros < $cantMaxPasajeros) {
                    $disponible = true ;
                }
            return $disponible ;
        }
        
        /**
         * Almacena en una cadena los datos de los pasajeros
         * @return array
         */
        public function datosPasajeros() {
            // string $cadena 
            // array $coleccPasajeros
            // string $nombrePasaj, $apellidoPasaj
            // int $nroDocPasaj, $nroTelPasaj

            $cadena = "" ; 
            $coleccPasajeros = $this -> getColeccPasajeros() ; 

            for($i=0 ; $i<count($coleccPasajeros) ; $i++) {
                /// probar get objeto
                // echo objeto

                $nombrePasaj = $coleccPasajeros[$i] -> getNombrePasajero() ;
                // $apellidoPasaj = $coleccPasajeros[$i] -> getApellidoPasajero() ;
                $nroAsiento = $coleccPasajeros[$i] -> getNroAsiento() ;
                $nroTicket = $coleccPasajeros[$i] -> getNroTicket() ;
                $cadena = $cadena . "Nombre: " . $nombrePasaj . "\n" . 
                    // "Apellido: " . $apellidoPasaj . "\n" .  
                    "Nro de documento: " . $nroAsiento . "\n" .  
                    "Nro de Telefono: " . $nroTicket . "\n" . "\n" ;
            }    
            return $cadena ; 
        }   
        
        public function __toString() {
            $cadena = $this -> datosPasajeros() ; 
            return "Codigo del viaje: " . $this -> getCodigoViaje() . "\n" . 
                "Destino: " . $this -> getDestino() . "\n" . 
                "Cantidad maxima de pasajeros: " . $this -> getCantMaxPasajeros() . "\n" .
                "\n" . 
                "Datos del responsable: " . $this -> getResponsableV() . "\n" .
                "Datos de los pasajeros: " . "\n" . "\n" . $cadena ; 
        }
    }