<?php

class Recibo {
    private $numeroRecibo;
    private $valor;
    private $fecha;
    private $hora;
    private $vehiculo;

    public function __construct($numeroRecibo, $valor, $fecha, $hora, $vehiculo) {
        $this->numeroRecibo = $numeroRecibo;
        $this->valor = $valor;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->vehiculo = $vehiculo;
    }

    public function getNumeroRecibo() {
        return $this->numeroRecibo;
    }
    public function getValor() {
        return $this->valor;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getHora() {
        return $this->hora;
    }
    public function getVehiculo() {
        return $this->vehiculo;
    }

    public function setNumeroRecibo($numeroRecibo) {
        $this->numeroRecibo = $numeroRecibo;
    }
    public function setValor($valor) {
        $this->valor = $valor;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setHora($hora) {
        $this->hora = $hora;
    }
    public function setVehiculo($vehiculo) {
        $this->vehiculo = $vehiculo;
    }

    public function __toString() {
        return "Recibo Nº: " . $this->getNumeroRecibo() . "\n" .
               "Valor: $" . $this->getValor() . "\n" .
               "Fecha: " . $this->getFecha() . "\n" .
               "Hora: " . $this->getHora() . "\n" .
               "Vehículo: " . $this->getVehiculo(). "\n";
    }
}