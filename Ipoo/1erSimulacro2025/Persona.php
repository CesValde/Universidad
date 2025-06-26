<?php 

class Persona {
    private $nombre ; 
    private $apellido ;
    private $direccion ;
    private $mail ;
    private $telefono ; 
    private $neto ; 

    public function __construct(
        $nombre, 
        $apellido, 
        $direccion,
        $mail,
        $telefono,
        $neto
    )
    {   
        $this -> nombre = $nombre ;
        $this -> apellido = $apellido ;
        $this -> direccion = $direccion ; 
        $this -> mail = $mail ; 
        $this -> telefono = $telefono ;
        $this -> neto = $neto ;
    }

    public function getNombre() {
        return $this -> nombre ; 
    }
    public function getApellido() {
        return $this -> apellido ;
    }
    public function getDireccion() {
        return $this -> direccion ;
    }
    public function getMail() {
        return $this -> mail ;
    }
    public function getTelefono() {
        return $this -> telefono ; 
    }
    public function getNeto() {
        return $this -> neto ;
    }

    public function setNombre($nombre) {
        $this -> nombre = $nombre ;
    }
    public function setApellido($apellido) {
        $this -> apellido = $apellido ;
    }
    public function setDireccion($direccion) {
        $this -> direccion = $direccion ;
    }
    public function setMail($mail) {
        $this -> mail = $mail ;
    }
    public function setTelefono($telefono) {
        $this -> telefono = $telefono ;
    }
    public function setNeto($neto) {
        $this -> neto = $neto ;
    }

    public function __toString() {
        return "Nombre del cliente: " . $this -> getNombre() . "\n" .
            "Apellido del cliente: " . $this -> getApellido() . "\n" .
            "Dirrecion: " . $this -> getDireccion() .  "\n" .
            "Mail: " . $this -> getMail() .  "\n" .
            "Numero de telefono: " . $this -> getTelefono() . "\n" .
            "Neto: " . $this -> getNeto()  ;
    }
}