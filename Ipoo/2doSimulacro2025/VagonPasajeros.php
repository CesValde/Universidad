<?php 

class VagonPasajeros extends Vagon{
    private $cantMaxPasaj;
    private $cantPasaj;
    private $pesoPromPasaj;

    public function  __construct(
        $pesoVagonVacio,
        $cantMaxPasaj,
        $cantPasaj,
    ) {
        parent:: __construct(
            $pesoVagonVacio,
        ) ;
        $this -> cantMaxPasaj = $cantMaxPasaj ; 
        $this -> cantPasaj = $cantPasaj ; 
        $this -> pesoPromPasaj = 50 ; 
    }

    public function getCantMaxPasaj() {
        return $this-> cantMaxPasaj ;
    }
    public function getCantPasaj() {
         return $this-> cantPasaj ;
    }
    public function getPesoPromPasaj() {
         return $this-> pesoPromPasaj ;
    }

    public function setCantMaxPasaj($cantMaxPasaj) {
        $this -> cantMaxPasaj = $cantMaxPasaj ;
    }
    public function setCantPasaj($cantPasaj) {
        $this -> cantPasaj = $cantPasaj ;
    }
    public function setPesoPromPasaj($pesoPromPasaj) {
        $this -> pesoPromPasaj = $pesoPromPasaj ;
    }

    /**
     * recibe por parámetro la cantidad de pasajeros que ingresan al vagón y tiene la responsabilidad de actualizar las variables 
     * instancias que 'representan el peso y la cantidad actual de pasajeros'. El método debe devolver verdadero o falso según si
     * se pudo o no agregar los pasajeros al vagón. 
     * @param int $cantPasajIncluir 
     * @return boolean
    */
    public function incorporarPasajeroVagon($cantPasajIncluir) {
        $agregaPasaj = false ;
        $asientosDispo = $this -> getCantMaxPasaj() - $this -> getCantPasaj();

        if($cantPasajIncluir < $asientosDispo) {
            $agregaPasaj = true ;

            /* Si se agregan pasajeros tengo que volver a calcular el peso del vagon ?? */

            $cantPasaj = $this-> getCantPasaj() + $cantPasajIncluir ;
            $this-> setCantPasaj($cantPasaj);
            $pesoVagon = $this -> calcularPesoVagon();
            $this-> setPesoVagonVacio($pesoVagon);
        }
        return $agregaPasaj ;
    }

    /**
     * Calcula el peso del vagon. No olvidar agregar el peso que tiene el vagón vacío
     * @return float
     */
    public function calcularPesoVagon() {
        $pesoVagonVacio = parent::calcularPesoVagon() ;
        $pesoVagon = ($pesoVagonVacio + ($this -> getCantPasaj() * $this -> getPesoPromPasaj()));
        return $pesoVagon ;
    }

    public function __toString() {
        $cadena = parent:: __toString() ; 

        return 
        $cadena. "\n". 
        "Cantidad maxima de pasajeros: ". $this-> getCantMaxPasaj(). "\n".
        "Cantidad de pasajeros: ". $this-> getCantPasaj(). "\n". 
        "Peso promedio por pasajero: ". $this-> getPesoPromPasaj() ;
    }
}