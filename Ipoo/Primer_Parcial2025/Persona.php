<?php 

class Persona {
    private $nombre;
    private $apellido;
    private $direccion;
    private $mail;
    private $telefono;

    public function __construct($nombre, $apellido, $direccion, $mail, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->mail = $mail;
        $this->telefono = $telefono;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getDireccion() {
        return $this->direccion;
    }
    public function getMail() {
        return $this->mail;
    }

    public function getTelefono() {
        return $this->telefono;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
    public function setMail($mail) {
        $this->mail = $mail;
    }
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function __toString() {
        return 
            "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "Dirección: " . $this->getDireccion() . "\n" .
            "Email: " . $this->getMail() . "\n" .
            "Teléfono: " . $this->getTelefono() . "\n";
    }
}