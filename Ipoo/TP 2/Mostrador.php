<?php 

    class Mostrador {
        private $tipoTramite ; 
        private $cola ;
        private $limiteCola ;

        public function __construct(
            $tipoTramite,
            $cola,
            $limiteCola 
        ) {
            $this -> tipoTramite = $tipoTramite ; 
            $this -> cola = $cola ;
            $this -> limiteCola = $limiteCola ;
        }

        public function getTipoTramite() {
            return $this -> tipoTramite  ; 
        }
        public function getCola() {
            return $this -> cola ;
        }
        public function getLimiteCola() {
            return $this -> limiteCola ;
        }

        public function setTipoTramite($tipoTramite) {
            $this -> tipoTramite = $tipoTramite ;
        }
        public function setCola($cola) {
            $this -> cola = $cola ;
        }
        public function setLimiteCola($limiteCola) {
            $this -> limiteCola = $limiteCola ;
        }

        /* devuelve true o false indicando si el tramite se puede atender o no en el mostrador */
        public function atiende($unTramite) {
            $atender = false ;
            $tipoTramite = $this -> getTipoTramite() ; 
            $cola = $this -> getCola() ; 
            $limiteCola = $this -> getLimiteCola() ;

            $unTramite = strtolower(str_replace(' ', '', $unTramite)) ;
            $tipoTramite = strtolower(str_replace(' ', '', $tipoTramite)) ;

            if($tipoTramite == $unTramite) {
                if(count($this -> getCola()) < $limiteCola) {
                    $i = 1 + count($cola) ; 
                    $atender = true ;
                    array_push($cola, $i) ;
                }
            }
            return $atender ;
        }

        /* retorna la cantidad promedio de trámites resueltos por día en este mes. */
        public function cantTramitesAtendidosMes() {
            $tramitesResuelDia = 0 ;
            $cantidadTramites = 0 ;     // buscar la cantidad de tramites hacer un count de un array de tramites 

            $tramitesResuelDia = $cantidadTramites / 30 ; 
            return $tramitesResuelDia ;
        }

        /* método que da el porcentaje de tramites resueltos sobre el total de recibidos */
        public function porcentajeTramitesResuelto() {
            $porcenTramiResuel = 0 ; 



            return $porcenTramiResuel ; 
        }

        public function __toString() {  
            $cola = count($this -> getCola()) ;
            return "Tipo de tramite: " . $this -> getTipoTramite() . "\n" .
                "Cantidad de personas en cola: " . $cola . "\n" . 
                "Cantidad maxima de personas en cola: " . $this -> getLimiteCola() ;
        }
    }