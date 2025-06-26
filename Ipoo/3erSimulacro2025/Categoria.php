<?php

class Categoria {
    private $idCategoria;   // futbol o basket
    private $descripcion;   // categoria menores, juveniles, mayores

    public function __construct($idCategoria, $descripcion) {
        $this->idCategoria = $idCategoria;
        $this->descripcion = $descripcion;
    }

    public function getIdCategoria() {
        return $this->idCategoria;
    }
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function __toString() {
        return 
            "ID de Categoría: " . $this->getIdCategoria() . "\n" .
            "Descripción: " . $this->getDescripcion();
    }
}