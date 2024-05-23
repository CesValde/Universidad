<?php 

class Persona {
    private $tipoDocumento;
    private $numeroDocumento;
    private $nombre;
    private $apellido;
    private $telefonoContacto;

    public function __construct($tipoDocumento, $numeroDocumento, $nombre, $apellido, $telefonoContacto) {
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefonoContacto = $telefonoContacto;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }

    public function __toString() {
        return "Tipo de documento: " . $this->getTipoDocumento() . "\n" .
               "Número de documento: " . $this->getNumeroDocumento() . "\n" .
               "Nombre: " . $this->getNombre() . "\n" .
               "Apellido: " . $this->getApellido() . "\n" .
               "Teléfono de contacto: " . $this->getTelefonoContacto();
    }
}