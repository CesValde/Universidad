<?php 

    /**
     * Guarda los datos de los pasajeros en un array 
     * @param
     */
    function datosPasajeros() {
        // 

        $datosPasajeros[] = [] ; 

        $datosPasajeros[0] = [
            "nombre" => "Lucia" ,
            "apellido" => "", 
            "numero de documento" => ""
        ] ;

        $datosPasajeros[1] = [
            "nombre" => "Cesar" ,
            "apellido" => "", 
            "numero de documento" => ""
        ] ;



        return $datosPasajeros ; 
    }

    class Viaje {
        private $destino ; 
        private $cantMaxPasajeros ; 
        private $cantPasajeros ; 

        private $nombrePasajero ; 
        private $apellidoPasajero ; 
        private $nroDocPasajero ; 

        public function __construct(
            $destino, 
            $cantMaxPasajeros,
            $cantPasajeros, 
            $nombrePasajero, 
            $apellidoPasajero, 
            $nroDocPasajero, 
        ) {
            $this -> destino = $destino ; 
            $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
            $this -> cantPasajeros = $cantPasajeros ; 
            $this -> nombrePasajero = $nombrePasajero ; 
            $this -> apellidoPasajero = $apellidoPasajero ; 
            $this -> nroDocPasajero = $nroDocPasajero ; 
        }

        // obetener los datos 
        public function getDestino() {
            return $this -> destino ;   
        }
        public function getCantMaxPasajeros() {
            return $this -> cantMaxPasajeros ; 
        }
        public function getCantPasajeros() {
            return $this -> cantPasajeros ;   
        }
        public function getNombre() {
            return $this -> nombrePasajero ; 
        }
        public function getApellido() {
            return $this -> apellidoPasajero ;   
        }
        public function getNroDoc() {
            return $this -> nroDocPasajero ; 
        }

        // asignamos los valores 
        public function setDestino($destino) {
            return $this -> destino = $destino ;   
        }
        public function setCantMaxPasajeros($cantMaxPasajeros) {
            return $this -> cantMaxPasajeros = $cantMaxPasajeros ; 
        }
        public function setCantPasajeros($cantPasajeros) {
            return $this -> cantPasajeros = $cantPasajeros ;   
        }
        public function setNombre($nombrePasajero) {
            return $this -> nombrePasajero = $nombrePasajero ; 
        }
        public function setApellido($apellidoPasajero) {
            return $this -> apellidoPasajero = $apellidoPasajero ;   
        }
        public function setNroDoc($nroDocPasajero) {
            return $this -> nroDocPasajero = $nroDocPasajero ; 
        }
        
        


    }


    /* Programa Viaje Feliz */
    //
    //


   

    echo "Ingrese destino: " ; 
    $destino = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad maxima de pasajeros: " ; 
    $cantMaxPasajeros = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de pasajeros: " ; 
    $cantPasajeros = trim(fgets(STDIN)) ; 
        for($i=0 ; $i<$cantPasajeros ; $i++) {
            echo "Ingrese nombre del pasajero: " ; 
            $nombrePasajero = trim(fgets(STDIN)) ; 
            echo "Ingrese apellido del pasajero: " ; 
            $apellidoPasajero = trim(fgets(STDIN)) ; 
            echo "Ingrese nro de documento: " ; 
            $nroDocPasajero = trim(fgets(STDIN)) ; 
            $datosPasajeros[$i]['nombre'] = $nombrePasajero ; 
            $datosPasajeros[$i]['apellido'] = $apellidoPasajero ; 
            $datosPasajeros[$i]['numero de documento'] = $nroDocPasajero ; 
        }

    // print_r($datosPasajeros) ; 


    $viaje = new Viaje($destino, $cantMaxPasajeros, $cantPasajeros, $nombrePasajero, $apellidoPasajero, $nroDocPasajero) ; 

    
    



   






    

    // $datosPasajeros = datosPasajeros() ; 
    // print_r($datosPasajeros) ; 