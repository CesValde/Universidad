<?php

    class Lectura {
        private $libro ;
        private $nropagLeyendo ;
        private $coleccLibros ;

        public function __construct(
            $libro, 
            $nropagLeyendo,
            $coleccLibros
        ) {
            $this -> libro = $libro ;
            $this -> nropagLeyendo = $nropagLeyendo ;
            $this -> coleccLibros = $coleccLibros ;
        }

        public function getLibro() {
            return $this -> libro ;
        }
        public function getNroPagLeyendo() {
            return $this -> nropagLeyendo ;
        }
        public function getColeccLibros() {
            return $this -> coleccLibros ;
        }

        public function setLibro($libro) {
            $this -> libro = $libro ;
        }
        public function setNroPagLeyendo($nropagLeyendo) {
            $this -> nropagLeyendo = $nropagLeyendo ;
        }
        public function setColeccLibros($coleccLibros) {
            $this -> coleccLibros = $coleccLibros ;
        }

        /**
         * método que retorna la página del libro y actualiza la variable que contiene la pagina actual.
         */
        public function siguientePagina() {
            $paginaLibro = $this -> getNroPagLeyendo() ; 
            return $paginaLibro ;
        }

        /**
         * método que retorna la página anterior a la actual del libro y actualiza su valor.
         */
        public function retrocederPagina() {
            $paginaAnterior = $this -> getNroPagLeyendo() ; 
            $paginaAnterior = $paginaAnterior - 1 ;
            $this -> setNroPagLeyendo($paginaAnterior) ; 
            return $paginaAnterior ;
        }

        /**
         * método que retorna la página actual y setea como página actual al valor recibido por parámetro.
         */
        public function irPagina($nroPag) {
            $this -> setNroPagLeyendo($nroPag) ;
            $paginaActual = $this -> getNroPagLeyendo() ;
            return $paginaActual ;
        }

        /* parte 2 */

        /* retorna true si el libro cuyo título recibido por parámetro se encuentra dentro del 
            conjunto de libros leídos y false en caso contrario. */
        public function libroLeido($titulo) {
            $coleccLibros = $this -> getColeccLibros() ;
            $leido = false ;          

            if(count($coleccLibros) > 0) {
                foreach($coleccLibros as $libro) {
                    $titulo = strtolower(str_replace(' ', '', $titulo));
                    $tituloArray = strtolower(str_replace(' ', '', $libro -> getTitulo()));
                        if($titulo == $tituloArray) {
                            $leido = true ;
                        }
                }
            }
            return $leido ;  

            // no me funco con el isset 
            /*  // $titulo = strtolower(str_replace(' ', '', $titulo));
            if(isset($this -> coleccLibros[$titulo])) {
                $leido = true;
            } else {
                $leido = false;
            }
            // echo $titulo ;
            return $leido ;  */
        }

        /*  retorna la sinopsis del libro cuyo título se recibe por parámetro */
        public function darSipnosis($titulo) {
            $coleccLibros = $this -> getColeccLibros() ;
            $isbn = -1 ;          

            if(count($coleccLibros) > 0) {
                foreach($coleccLibros as $libro) {
                    $titulo = strtolower(str_replace(' ', '', $titulo));
                    $tituloArray = strtolower(str_replace(' ', '', $libro -> getTitulo()));
                        if($titulo == $tituloArray) {
                            $isbn = $libro -> getIsbn() ;
                        }
                }
            }
            return $isbn ; 
        }

        /* retorne todos aquellos libros que fueron leídos y su año de edición es un año x recibido por parámetro. */
        public function leidosAnioEdicion($x) {
            $coleccLibros = $this -> getColeccLibros() ;
            $librosLeidosAnio = [] ;

            if(count($coleccLibros) > 0) {
                foreach($coleccLibros as $libro) {
                    $anioEdi = $libro -> getAnioEdi() ;
                        if($x == $anioEdi) {
                           array_push($librosLeidosAnio, $libro) ;
                        }
                }
            }

            return $librosLeidosAnio ; 
        }

        /* retorna todos aquellos libros que fueron leídos y el nombre de su autor coincide con el recibido por parámetro */
        public function darLibrosPorAutor($nombreAutor) {
            $coleccLibros = $this -> getColeccLibros() ;
            $librosLeidosAutor = [] ;

            if(count($coleccLibros) > 0) {
                foreach($coleccLibros as $libro) { 
                    $titulo = $libro -> getTitulo() ;
                    $leido = $this -> libroLeido($titulo) ;
                    if($leido) {
                        $autor = $libro -> getNombre() ;
                        if($nombreAutor == $autor) {
                           array_push($librosLeidosAutor, $libro) ;
                        }
                    }
                }
            }
            return $librosLeidosAutor ; 
        }

        public function __toString() {
            return "Datos del libro: " . $this -> getLibro() . "\n" .
                "Numero de pagina que se esta leyendo: " . $this -> getNroPagLeyendo() ; 
        }
    }