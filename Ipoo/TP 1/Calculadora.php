<?php 

    class Calculadora {
        private $num1 ;         // atributos 
        private $num2 ; 

        public function __construct($nro1, $nro2) {         // constructor 
            $this -> num1 = $nro1 ;     
            $this -> num2 = $nro2 ; 
        }

        public function getNum1() {             // metodos
            return $this -> num1 ; 
        }
        public function getNum2() {             // metodos
            return $this -> num2 ; 
        }
        public function setNum1($nro1) {
            $this -> num1 = $nro1 ; 
        }
        public function setNum2($nro2) {
            $this -> num2 = $nro2 ; 
        } 
        public function sumar() {
            $resulSuma = $this -> getNum1() + $this -> getNum2() ; 
            return $resulSuma ; 
        }
        public function restar() {
            $resulResta = $this -> getNum1() - $this -> getNum2() ; 
            return $resulResta ; 
        }
        public function multiplicar() {
            $resulMulti = $this -> getNum1() * $this -> getNum2() ; 
            return $resulMulti ; 
        }
        public function dividir() {
            $resulDivision = $this -> getNum1() / $this -> getNum2() ; 
            return $resulDivision ; 
        }

    }
    
    /* Usar test cafetera */
    
    /*
    $suma = new Calculadora(5, 10) ; 
    $restar = new Calculadora(8, 10) ;
    $multi = new Calculadora(3, 20) ;
    $division = new Calculadora(7, 10) ;    
    // echo "Numero 1: " . $suma -> getNum1() . "\n" ; 
    // echo "Numero 2: " . $suma -> getNum2() . "\n" ; 
    $calculoSuma = $suma -> sumar() ; 
    $calculoResta = $restar -> restar() ; 
    $calculoMulti = $multi -> multiplicar() ; 
    $calculoDivision = $division -> dividir() ; 
    echo $calculoSuma . "\n" ; 
    echo $calculoResta . "\n" ; 
    echo $calculoMulti . "\n" ; 
    echo $calculoDivision . "\n" ; 
    */