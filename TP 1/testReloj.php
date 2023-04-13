<?php 

    include 'Reloj.php' ; 

    $objReloj = new Reloj(23, 59, 58) ; 

    echo $objReloj . "\n" ; 
    $objReloj -> incrementar() ;
    echo "1er incremento: " . $objReloj . "\n" ; 
    $objReloj -> incrementar() ;
    echo "2do incremeneto: " . $objReloj . "\n" ; 
    $objReloj -> incrementar() ; 
    echo "3er incremento: " . $objReloj . "\n" ; 

    $objReloj -> puestaACero() ; 
    echo $objReloj ; 