<?php

    class Teatro {
        private $nombreTeatro ; 
        private $direccion ;
        private $coleccFunciones ; 

        public function __construct(
            $nombreTeatro, 
            $direccion, 
            $coleccFunciones
        )
        {   
            $this -> nombreTeatro = $nombreTeatro ;
            $this -> direccion = $direccion ;
            $this -> coleccFunciones = $coleccFunciones ;
        }

        public function getNombreTeatro() {
            return $this -> nombreTeatro ; 
        }
        public function getDireccion() {
            return $this -> direccion ;
        }
        public function getColeccFunciones() {
            return $this -> coleccFunciones ;
        }

        public function setNombreTeatro($nombreTeatro) {
            $this -> nombreTeatro = $nombreTeatro ;
        }
        public function setDireccion($direccion) {
            $this -> direccion = $direccion ;
        }
        public function setColeccFunciones($coleccFunciones) {
            $this -> coleccFunciones = $coleccFunciones ;
        }

        public function cambiarNombreTeatro($nombre) {
            $this -> setNombreTeatro($nombre) ;
        }
        public function cambiarDireccion($direccion) {
            $this -> setDireccion($direccion) ;
        }

        /* Cambia el nombre y el precio de la funcion de dicho id */
        public function cambiarFuncion($id, $nombre, $precio) {
            $coleccFunciones = $this -> getColeccFunciones() ;

            foreach($coleccFunciones as $clave => $funcion) { 
                if($id == $funcion["id"]) {
                    $coleccFunciones[$clave]["nombre"] = $nombre;
                    $coleccFunciones[$clave]["precio"] = $precio;
                    $this -> setColeccFunciones($coleccFunciones) ;
                }
            }
        }

        /* Retorna una cadena de funciones */
        public function mostrarFunciones() {
            $coleccFunciones = $this -> getColeccFunciones() ;
            $cadenaFunciones = "" ;

            foreach($coleccFunciones as $clave => $funcion) {
                $cadenaFunciones .= "\n" . 
                "id: " . $funcion["id"] . "\n" .
                "Nombre: " . $funcion["nombre"] . "\n" . 
                "Precio: " . $funcion["precio"] . "\n"  ;
            }

            return $cadenaFunciones ;
        }

        public function __toString() {
            $cadenaFunciones = $this -> mostrarFunciones() ;
            return "Nombre del teatro: " . $this -> getNombreTeatro() . "\n" .
                "Direccion: " . $this -> getDireccion() . "\n" .  "\n" .
                "Funciones del dia: " . $cadenaFunciones ;   
        }
    }