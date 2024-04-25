<?php 
    
    class ModuloPresencial extends Modulo {
        public function __construct(
        ) {
            parent:: __construct(
            ) ; 
        }  

        /**
         * Retorna el importe final correspondiente a la inscripción de un respectivo módulo
         * @return int 
         */
        public function darCostoMódulo() {
            $total = parent::darCostoMódulo() ; 
            return $total ; 
        }

        public function __toString() {
            $cadena = parent::__toString() ;
            return $cadena . "\n" ;
        }
    }