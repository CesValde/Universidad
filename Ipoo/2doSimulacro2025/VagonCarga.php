<?php 

class VagonCarga extends Vagon{
    private $pesoMaxTransportar;
    private $pesoCargaTransportado;

    public function  __construct(
        $pesoVagonVacio,
        $pesoMaxTransportar,
        $pesoCargaTransportado
    ) {
        parent:: __construct(
            $pesoVagonVacio
        ) ;
        $this -> pesoMaxTransportar = $pesoMaxTransportar ; 
        $this -> pesoCargaTransportado = $pesoCargaTransportado ; 
    }

    public function getPesoMaxTransportar() {
        return $this-> pesoMaxTransportar ;
    }
    public function getPesoCargaTransportado() {
         return $this-> pesoCargaTransportado ;
    }

    public function setPesoMaxTransportar($pesoMaxTransportar) {
        $this -> pesoMaxTransportar = $pesoMaxTransportar ;
    }
    public function setPesoCargaTransportado($pesoCargaTransportado) {
        $this -> pesoCargaTransportado = $pesoCargaTransportado ;
    }

    /**
     * Recibe por parámetro la cantidad de carga que va a transportar el vagón y tiene la responsabilidad de actualizar las variables instancias que representan
     * el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la carga al vagón. 
     * @param int $pesoTransportar
     * @return boolean
     */
    public function incorporarCargaVagon($pesoTransportar) {
        $agregaCarga = false ;
        $pesoDispo = $this -> getPesoMaxTransportar() - $this-> getPesoCargaTransportado();

        if($pesoTransportar < $pesoDispo) {
            $agregaCarga = true ;

            /* Si se agrega carga tengo que volver a sacar el 20% ?? */

            $pesoCargaTransportado = $this-> getPesoCargaTransportado() + $pesoTransportar;
            $this-> setPesoCargaTransportado($pesoCargaTransportado);
            $pesoVagon = $this -> calcularPesoVagon() ;
            $this -> setPesoVagonVacio($pesoVagon) ; 
        }
        return $agregaCarga ;
    }

    /**
     * Calcula el peso del vagon. No olvidar agregar el peso que tiene el vagón vacío
     * @return float
     */
    public function calcularPesoVagon() {
        $pesoVagonVacio = parent::calcularPesoVagon() ;
        $indice = ($this -> getPesoCargaTransportado() * 0.2) ;
        $pesoVagon = $pesoVagonVacio + $this->getPesoCargaTransportado() + $indice ;
        return $pesoVagon ; 
    }

    public function __toString() {
        $cadena = parent:: __toString() ; 

        return 
        $cadena. "\n".
        "Peso maximo a transportar: ". $this-> getPesoMaxTransportar(). "\n". 
        "Peso a transportar: ". $this-> getPesoCargaTransportado() ;
    }
}