<?php

class Formacion {
    private $locomotora; 
    private $maxVagones;
    private $coleccVagones;    
     

    public function __construct($locomotora, $maxVagones) {
        $this->locomotora = $locomotora;
        $this->maxVagones = $maxVagones;
        $this->coleccVagones = []; 
    }

    public function getLocomotora() {
        return $this->locomotora;
    }

    public function getColeccVagones() {
        return $this->coleccVagones;
    }

    public function getMaxVagones() {
        return $this->maxVagones;
    }

    public function setLocomotora($locomotora) {
        $this->locomotora = $locomotora;
    }

    public function setColeccVagones($coleccVagones) {
        $this->coleccVagones = $coleccVagones;
    }

    public function setMaxVagones($maxVagones) {
        $this->maxVagones = $maxVagones;
    }

    /**
     * Recibe la cantidad de pasajeros que se desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de incorporar esa cantidad de pasajeros. 
     * Si no hay ningún vagón en la formación que pueda ingresar la cantidad de pasajeros, el método  debe retornar un valor falso y verdadero en caso contrario. 
     * Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros
     * @param int $cantPasajIncluir
     * @return boolean
     */
    public function incorporarPasajeroFormacion($cantPasajIncluir) {
        $incorpora = false ;
        $coleccVagones = $this -> getColeccVagones() ; 
        $i = 0 ;

        while($incorpora == false && $i<count($coleccVagones)) {
            $vagon = $coleccVagones[$i] ;
            if(is_a($vagon, "VagonPasajeros") && $vagon->incorporarPasajeroVagon($cantPasajIncluir)) {
                $incorpora = true ;
            }
            $i++ ;
        }
        return $incorpora ;
    }

    /**
     * Recibe por parámetro un objeto vagón y lo incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito y falso en caso contrario.
     * @param object $objVagon
     * @return boolean
     */
    public function incorporarVagonFormacion($objVagon) {
        $incorpora = false ;
        $coleccVagones = $this -> getColeccVagones() ;

        if(count($coleccVagones) < $this-> getMaxVagones()) {
            $coleccVagones[] = $objVagon  ;
            $this -> setColeccVagones($coleccVagones) ;
            $incorpora = true ;
        }

        /* 
            Hay que verficar que el vagon tenga las personas y/o cargas permitidas ???  
            o es un gaon que no tiene personas ni carga ?? 
        */

        return $incorpora ;
    }

     /**
     * Recorre la colección de vagones y retorna un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. 
     * Puede utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.
     * @return float
     */
    public function promedioPasajeroFormacion() {
        $coleccVagones = $this->getColeccVagones() ;
        $promedioPasaj = 0 ;
        $cantPasajeros = 0 ;
        $cantVagPasaj = 0 ;

        for($i=0 ; $i<count($coleccVagones) ; $i++) {
            $vagon = $coleccVagones[$i] ;
            if(is_a($vagon, "VagonPasajeros")) {
                $cantPasajeros += $vagon -> getCantPasaj() ;
                $cantVagPasaj++ ; 
            }
        }
        $promedioPasaj = $cantPasajeros / $cantVagPasaj ;
        return $promedioPasaj ;
    }

    /**
     * retorna el peso de la formación completa.
     * @return int 
     */
    public function pesoFormacion() {
        $pesoFormacion = 0 ;
        $coleccVagones = $this -> getColeccVagones() ; 

        for($i=0 ; $i<count($coleccVagones) ; $i++) {
           $acum = $coleccVagones[$i] -> calcularPesoVagon() ;
           $pesoFormacion += $acum ;
        }
        return $pesoFormacion ; 
    }

    /**
     * retorna el primer vagón de la formación que aún no se encuentra completo
     * @return object
     */
    public function retornarVagonSinCompletar() {
        $vagon = null ;
        $coleccVagones = $this -> getColeccVagones() ;
        $i=0; 

        while($vagon == null && $i<count($coleccVagones)) {
            $vagonBuscado = $coleccVagones[$i] ;
            if( is_a($vagonBuscado, "VagonPasajeros") && $vagonBuscado-> getCantPasaj() < $vagonBuscado-> getCantMaxPasaj()
                || 
                is_a($vagonBuscado, "Vagoncarga") && $vagonBuscado-> getPesoCargaTransportado() < $vagonBuscado-> getPesoMaxTransportar()
            ) {
                $vagon = $vagonBuscado ;
            }   // en caso de que exista un vagon que no sea de carga o pasajeros hacer un else con un peso default ? (15.000)
            $i++ ;
        }
        return $vagon ; 
    }

    public function __toString() {
        $cadenaVagones = "" ;
        foreach($this-> getColeccVagones() as $vagon) {
            $cadenaVagones = "" . $vagon . "\n" ;
        }

        return 
        "Locomotora: ". $this-> getLocomotora(). "\n". 
        "Coleccion de vagones: ". $this->  $cadenaVagones. "\n". 
        "Cantidad maxima de vagones: ". $this-> getMaxVagones() ;
    }
}