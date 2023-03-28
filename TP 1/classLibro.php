<?php 

    class Libro {
        private $isbn ; 
        private $titulo ; 
        private $anioEdi ; 
        private $editorial ; 
        private $nombre ; 
        private $apellido ; 

        public function __construct(
            $isbn,
            $titulo,
            $anioEdi,
            $editorial,
            $nombre,
            $apellido
        ) {
            $this -> isbn = $isbn ;             
            $this -> titulo = $titulo ; 
            $this -> anioEdi = $anioEdi ; 
            $this -> editorial = $editorial ; 
            $this -> nombre = $nombre ; 
            $this -> apellido = $apellido ; 
        }

        public function getIsbn() {
            return $this -> isbn ; 
        }
        public function getTitulo() {
            return $this -> titulo ;
        }   
        public function getAnioEdi() {
            return $this -> anioEdi ;
        }
        public function getEditorial() {
            return $this -> editorial ;
        }
        public function getNombre() {
            return $this -> nombre ;
        }
        public function getApellido() {
            return $this -> apellido ; 
        }
        public function setIsbn($isbn) {
            return $this -> isbn = $isbn ; 
        }
        public function setTitulo($titulo) {
            return $this -> titulo = $titulo ;
        }
        public function setAnioEdi($anioEdi) {
            return $this -> anioEdi = $anioEdi ;
        }
        public function setEditorial($editorial) {
            return $this -> editorial = $editorial ;
        }
        public function setNombre($nombre) {
            return $this -> nombre = $nombre ;
        }
        public function setApellido($apellido) {
            return $this -> apellido = $apellido ; 
        }

        public function perteneceEditorial($pertEditorial) {

            

            return $pertEditorial ; 
        }
    }