<?php

class Locomotora {
    private $peso;
    private $velocidadMaxima;

    public function __construct($peso, $velocidadMaxima) {
        $this->peso = $peso;
        $this->velocidadMaxima = $velocidadMaxima;
    }

    public function getPeso() {
        return $this->peso;
    }
    public function getVelocidadMaxima() {
        return $this->velocidadMaxima;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }
    public function setVelocidadMaxima($velocidadMaxima) {
        $this->velocidadMaxima = $velocidadMaxima;
    }


    public function __toString() {
        return 
        "Peso locomotora: " . $this->getPeso() . " kg" . "\n" .
        "Velocidad Máxima: " . $this->getVelocidadMaxima() . " km/h";
    }
}