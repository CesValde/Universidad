<?php 
    include "classCalculadora.php" ; 

    /* Test Class Calculadora */ 
    
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