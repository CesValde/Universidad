<?php 

class Vagon {
    private $anioInstalacion;
    private $largo;
    private $ancho; 
    private $pesoVagonVacio;

    public function __construct($pesoVagonVacio) {
        $this-> anioInstalacion = 2025;
        $this-> largo = "10mtrs";
        $this-> ancho = "7mtrs";
        $this-> pesoVagonVacio = $pesoVagonVacio;
    }

    public function getAnioInstalacion() {
        return $this-> anioInstalacion;
    }
    public function getLargo() {
        return $this-> largo;
    }
    public function getAncho() {
        return $this-> ancho;
    }
    public function getPesoVagonVacio() {
        return $this-> pesoVagonVacio;
    }

    public function setAnioInstalacion($anioInstalacion) {
        $this-> anioInstalacion = $anioInstalacion;
    }
    public function setLargo($largo) {
        $this-> largo = $largo;
    }
    public function setAncho($ancho) {
        $this-> ancho = $ancho;
    }
    public function setPesoVagonVacio($pesoVagonVacio) {
        $this-> pesoVagonVacio = $pesoVagonVacio;
    }

    /**
     * Calcula el peso del vagon. No olvidar agregar el peso que tiene el vagón vacío
     * @return int 
     */
    public function calcularPesoVagon() {
        $pesoVagon = $this -> getPesoVagonVacio() ;
        return $pesoVagon ;
    }

    public function __toString() {
        return 
        "Año de instalacion: ". $this-> getAnioInstalacion(). "\n". 
        "Largo del vagon: ". $this-> getLargo(). "\n".
        "Ancho del vagon: ". $this-> getAncho(). "\n".
        "Peso del vagon vacio: ". $this-> getPesoVagonVacio() ;
    }
}