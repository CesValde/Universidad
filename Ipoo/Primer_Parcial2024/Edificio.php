<?php 

class Edificio {
    private $direccion;
    private $colInmuebles;
    private $objAdministrador;

    public function __construct($direccion, $colInmuebles, $objAdministrador) {
        $this-> direccion = $direccion;
        $this-> colInmuebles = $colInmuebles;
        $this-> objAdministrador = $objAdministrador;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getColInmuebles() {
        return $this->colInmuebles;
    }

    public function getObjAdministrador() {
        return $this->objAdministrador;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function setColInmuebles($colInmuebles) {
        $this->colInmuebles = $colInmuebles;
    }

    public function setObjAdministrador($objAdministrador) {
        $this->objAdministrador = $objAdministrador;
    }

    /* 
        recibe por parámetro el tipo de uso del inmueble y el costo mensual mensual máximo que se puede 
        pagar y retorna una colección de todos los departamentos del tipo de uso recibido (tipoUso) 
        que se encuentran disponibles para ser alquilados y cuyo costo mensual no supera el valor 
        recibido en el parámetro costoMaximo
    */
    public function darInmueblesDisponibles($tipoUso, $costoMaximo) {
        $colDisponibles = [] ;
        
        foreach($this -> getColInmuebles() as $unInm) {
            $disponible = $unInm -> estaDisponible($tipoUso, $costoMaximo) ;
            if($disponible) {
                $colDisponibles[] = $unInm ;
            } 
        }
        return $colDisponibles ;
    } 

    /* 
        recibe por parámetro un objeto inmueble y retorna el índice de la colección donde se encuentra 
        almacenado. Si el objeto no existe en la colección se debe retornar el valor -1
    */
    public function buscarInmueble($inmueble) {
        $colInmuebles = $this -> getColInmuebles();
        $codigo = $inmueble -> getCodigoReferencia() ;
        $indice = -1 ;
        $i=0 ;

        while($indice == -1 || $i < count($colInmuebles)) {
            $unInm = $colInmuebles[$i] ;
            $cod = $unInm -> getCodigoReferencia() ;
                if($cod == $codigo) {
                    $indice = $i ; 
                }
            $i++ ;
        }
        return $indice ;
    }

    /* 
        recibe por parámetro el tipo de uso que se requiere para el inmueble (tipoUso), el monto máximo 
        (montoMaximo) a pagar por mes y la referencia a la persona que desea alquilar (objPersona) 
        el inmueble. Tener en cuenta que solo se va a poder realizar el alquiler de dicho inmueble si 
        se verifica la política de alquiler de la empresa.  Por política de la empresa, los inmuebles 
        de un edificio se deben ir ocupando por piso y por tipo. Es decir, hasta que todos los inmuebles 
        de un piso y de un tipo no se encuentren ocupados, no es posible alquilar un inmueble de un piso 
        superior.
        El método debe retornar verdadero en caso de poder registrar el alquiler o falso en caso contrario. 
        Recordar actualizar las estructuras correspondientes
    */
    public function registrarAlquilerInmueble($tipoUso, $costoMaximo, $objPersona) {
        $colInmuebles = $this -> getColInmuebles() ;
        $colInmDisponibles = [] ;
        $colInmDisponibles = $this -> darInmueblesDisponibles($tipoUso, $costoMaximo) ;
        $pisoMasBajo = 9999999999 ;
        $alquilado = false ;
        $i=0 ;

        foreach($colInmDisponibles as $inmueble) {
            $numPiso = $inmueble -> getNumeroPiso() ;
            if($numPiso < $pisoMasBajo) {
                $pisoMasBajo = $numPiso ;       // 2
            }
        }

        while($alquilado == false && $i < count($colInmDisponibles)) {
            $unInm = $colInmDisponibles[$i] ;
            $disponible = $unInm -> estaDisponible($tipoUso, $costoMaximo) ;
            if($disponible) {
                if($unInm -> getNumeroPiso() === $pisoMasBajo || $unInm -> getNumeroPiso() < $pisoMasBajo) {
                    $unInm -> alquilar($objPersona) ;
                    $indice = $this -> buscarInmueble($unInm) ;
                    $colInmuebles[$indice] = $unInm ;
                    $this -> setColInmuebles($colInmuebles) ;
                    $alquilado = true ;
                }
            }
            $i++ ;
        }
        return $alquilado ;
    }

    public function calculaCostoEdificio() {
        $costo = 0 ; 
        foreach($this -> getColInmuebles() as $unInm) {
            if($unInm -> getObjInquilino() != null) {
                $costo += $unInm -> getCostoMensual() ; 
            }
        }
        return $costo ;
    }

    public function __toString() {
        return "Dirección: " . $this->getDireccion() . "\n" .
               "Administrador: " . $this->getObjAdministrador() . "\n" .
               "Cantidad de inmuebles: " . count($this->colInmuebles);
    }
}