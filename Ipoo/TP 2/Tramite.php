<?php 

    class Tramite {
        private $nombreTramite ;
        private $cliente ;
        private $fecha_ingreso ; 
        private $fecha_cierre ;
        private $horario_ingreso ; 
        private $horario_cierre ; 
        private $estado ;               

        public function __construct(
            $nombreTramite,
            $cliente,
            $fecha_ingreso, 
            $fecha_cierre, 
            $horario_ingreso, 
            $horario_cierre, 
            $estado 
        )
        {
            $this -> nombreTramite = $nombreTramite ;
            $this -> cliente = $cliente ;
            $this -> fecha_ingreso = $fecha_ingreso ;
            $this -> fecha_cierre = $fecha_cierre ;
            $this -> horario_ingreso = $horario_ingreso ;
            $this -> horario_cierre = $horario_cierre ;
            $this -> estado = $estado ;
        }

        public function getNombreTramite() {
            return $this -> nombreTramite ;
        }
        public function getCliente() {
            return $this -> cliente ; 
        }
        public function getFechaIngreso() {
            return $this -> fecha_ingreso ; 
        }
        public function getFechaCierre() {
            return $this -> fecha_cierre ; 
        }
        public function getHorarioIngreso() {
            return $this -> horario_ingreso ; 
        }
        public function getHorarioCierre() {
            return $this -> horario_cierre ; 
        }
        public function getEstado() {
            return $this -> estado ; 
        }

        public function setNombreTramite($nombreTramite) {
            $this -> nombreTramite = $nombreTramite  ;
        }
        public function setCliente($cliente) {
            $this -> cliente = $cliente  ;
        }
        public function setFechaIngreso($fecha_ingreso) {
            $this -> fecha_ingreso = $fecha_ingreso  ;
        }
        public function setFechaCierre($fecha_cierre) {
            $this -> fecha_cierre = $fecha_cierre  ;
        }
        public function setHorarioIngreso($horario_ingreso) {
            $this -> horario_ingreso = $horario_ingreso  ;
        }
        public function setHorarioCierre($horario_cierre) {
            $this -> horario_cierre = $horario_cierre  ;
        }
        public function setEstado($estado) {
            $this -> estado = $estado; 
        }
        

        /* retorna la cantidad de trámites abiertos de un cliente */
        public function cantTramitesAbiertos() {
            $cantTramitesAbiertos = 0 ;


            return $cantTramitesAbiertos ;
        }

        /* retorna la cantidad de trámites cerrados de un cliente */
        public function cantTramitesCerrados() {
            $cantTramitesCerrados = 0 ;


            return $cantTramitesCerrados ;
        }



        public function __toString() {
            return "Horario de Creacion: " . $this -> getHorarioCreacion() . "\n" . 
            "Horario realizado: " . $this -> getHorarioRealizado() ;
        }
        
    }