<?php 

class CabinaPeaje {
    private $vehiculos; 
    private $recibos;    

    public function __construct($vehiculos, $recibos) {
        $this->vehiculos = $vehiculos;
        $this->recibos = $recibos;
    }

    public function getColeccVehiculos() {
        return $this->vehiculos;
    }
    public function setColeccVehiculos($vehiculos) {
        $this->vehiculos[] = $vehiculos;
    }

    public function getColeccRecibos() {
        return $this->recibos;
    }
    public function setColeccRecibos($recibos) {
        $this->recibos[] = $recibos;
    }

    /**
     * obtiene el valor del peaje del vehículo, genera y retorna el recibo correspondiente. 
     */
    public function cobrarPeaje($unTipoRegistroVehículo, $info) {
        $recibo = null;
        
        if($unTipoRegistroVehículo == 'camion') {
            $vehiculo = new Camion($info['patente'], $info['peso'], $info['cantEjes']);
        } else if($unTipoRegistroVehículo == 'transporteEscolar') {
            $vehiculo = new TransporteEscolar($info['patente'], $info['capacidadMax']);
        } else if($unTipoRegistroVehículo == 'vehiculoParticular') {
            $vehiculo = new VehiculoParticular($info['patente']);
        }
        $valorRecibo = $vehiculo -> calcularPeaje();
        $recibo = new Recibo(count($this->getColeccRecibos()) + 1, $valorRecibo, date('d-m-Y'), '18:00', $vehiculo);
        $this->setColeccRecibos($recibo);
        return $recibo ;
    }

    /**
     * retorna el recibo con mayor valor de peaje para una fecha dada.
     */
    public function reciboMayorMonto($fecha) {
        $reciboMayorMonto = null ;
        $mayorMonto = -1 ;

        foreach($this->getColeccRecibos() as $recibo) {
            if($recibo->getFecha() == $fecha) {
                if($mayorMonto < $recibo->getValor()) {
                    $mayorMonto = $recibo->getValor();
                    $reciboMayorMonto = $recibo;
                }
            }
        }
        return $reciboMayorMonto ;
    }

    /**
     *  retorna el monto total recaudado por la cabina, para una fecha y un tipo de vehículo dado. (Puede utilizar la función de PHP get_class($objeto) 
     *  que retorna el nombre de la clase a la que pertenece el objeto. 
     */
    public function recaudacionXTipoVehiculo($fecha, $tipoRegistroVehiculo) {
        $montoTotalCabinaVehiculo = 0 ;

        foreach($this->getColeccRecibos() as $recibo) {
            if($tipoRegistroVehiculo == get_class($recibo->getVehiculo()) && $recibo->getFecha() == $fecha) {
                $montoTotalCabinaVehiculo += $recibo->getValor();
            }  
        }
        return $montoTotalCabinaVehiculo ;
    }

    /**
     * retorna el monto total recaudado por la cabina para una fecha dada.
     */
    public function totalRecaudado($fecha) {
        $montoTotalCabina = 0 ;
        foreach($this->getColeccRecibos() as $recibo) { 
            if($recibo->getFecha() == $fecha) {
                $montoTotalCabina += $recibo->getValor();
            }
        }
        return $montoTotalCabina ;
    }

    public function mostrarVehiculos() {
        $cadenaVehiculos = "";
        foreach ($this->getColeccVehiculos() as $vehiculo) {
            $cadenaVehiculos .= $vehiculo . "\n";
        }
        return "Vehículos:\n" . $cadenaVehiculos ;
    }

    public function mostrarRecibos() {
        $cadenaRecibos = '';
        foreach ($this->getColeccRecibos() as $recibo) {
            $cadenaRecibos .= $recibo . "\n";
        }

        return "Recibos:\n" . $cadenaRecibos;
    }

    public function __toString() {
        $cadenaVehiculos = $this -> mostrarVehiculos() ;
        $cadenaRecibos = $this -> mostrarRecibos() ;
        return
            "Cabina de Peaje\n" .
            $cadenaVehiculos.
            $cadenaRecibos;
    }
}
