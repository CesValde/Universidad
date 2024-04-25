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

    public function __toString() {
        return "Tipo de documento: " . $this->tipoDocumento . "\n" .
               "Número de documento: " . $this->numeroDocumento . "\n" .
               "Nombre: " . $this->nombre . "\n" .
               "Apellido: " . $this->apellido . "\n" .
               "Teléfono de contacto: " . $this->telefonoContacto;
    }
}