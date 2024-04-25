<?php 

    class BancoT {
        private $coleccMostradores ;
        private $coleccTramites ;

        public function __construct($coleccMostradores) {
            $this -> coleccMostradores = $coleccMostradores ;
        }

        public function getColeccionMostradores() {
            return $this -> coleccMostradores ;
        }

        public function setColeccionMostradores($coleccMostradores) {
            $this -> coleccMostradores = $coleccMostradores ; 
        }

        /* retorna la colección de todos los mostradores que atienden ese trámite */
        public function mostradoresQueAtienden($unTramite) { 
            $coleccMostradores = $this -> getColeccionMostradores() ; 
            $mostradoresAtienden = [] ;   

            foreach($coleccMostradores as $mostrador) {
                $tipoTramite = $mostrador -> getTipoTramite() ;
                $unTramite = strtolower(str_replace(' ', '', $unTramite)) ;
                $tipoTramite = strtolower(str_replace(' ', '', $tipoTramite)) ;

                if($unTramite == $tipoTramite) {
                    array_push($mostradoresAtienden, $mostrador) ;  
                }
            }
            return $mostradoresAtienden ;   
        }

        /* retorna el mostrador con la cola más corta con espacio para al menos una persona más y que 
            atienda ese trámite; si ningun mostrador tiene espacio, retorna null. */
        public function mejorMostradorPara($unTramite) {        // visa 
            $coleccMostradores = $this -> getColeccionMostradores() ; 
            $mejorMostrador = null ;
            $colaMenosLarga = 99999 ; 

            foreach($coleccMostradores as $mostrador) {               
                $atender = $mostrador -> atiende($unTramite) ;
                    if($atender) {
                        if(count($mostrador -> getCola()) < $mostrador -> getLimiteCola()) {
                            if(count($mostrador -> getCola()) < $colaMenosLarga) {
                                $mejorMostrador = $mostrador ;
                                $colaMenosLarga = count($mostrador -> getCola()) ;
                            }
                        }
                    } 
            } 
            return $mejorMostrador ;
        }

        /* Si la persona se puede incluir a la cola mas corta de su tramite retorna un mensaje, sino hay colas 
            disponibles retornara un mensaje distinto */
        public function atender($unCliente) {
            $unTramite = $unCliente -> getTipoTramite() ; 
            $disponible = $this -> mejorMostradorPara($unTramite) ;
                if($disponible == null) {
                    $mensaje = "Será antendido en cuanto haya lugar en un mostrador" ; 
                } else {
                    $mensaje = "En fila" ; 
                }
            return $mensaje ;
        }

        /* Retorna una cadena de mostadores */
        public function mostrarMostradores() {
            $cadenaMostradores = "" ; 
            $coleccMostradores = $this -> getColeccionMostradores() ;
            foreach($coleccMostradores as $mostrador) {
                $cadenaMostradores = $cadenaMostradores . "\n" .
                "Tipo de tramite: " . $mostrador -> getTipoTramite() . "\n" .
                "Cantidad de personas en cola: " . count($mostrador -> getCola()) . "\n" . 
                "Cantidad maxima de personas en cola: " . $mostrador -> getLimiteCola() ;  
            }
            return $cadenaMostradores ; 
        }

        /* 2da parte  */

        public function ingresarTramite($unTramite){
            $coleccTramites = $this -> getColeccTramites() ;
            
        }

        public function f(){

        }

        public function g(){

        }

        public function t(){

        }
        
        public function __toString() {
            $cadenaMostradores = $this -> mostrarMostradores() ;
            return $cadenaMostradores ; 
        }
    }