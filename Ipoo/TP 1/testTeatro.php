<?php 

    include_once "Teatro.php" ;

    /* Test */

    $funcion1 = [
        "id" => 1 ,
        "nombre" => "One Piece" , 
        "precio" => 2000
    ] ;
    $funcion2 = [
        "id" => 2 ,
        "nombre" => "Maze Runner" , 
        "precio" => 3000
    ] ;
    $funcion3 = [
        "id" => 3 ,
        "nombre" => "Click" , 
        "precio" => 4000
    ] ;
    $funcion4 = [
        "id" => 4 ,
        "nombre" => "Fortnite" , 
        "precio" => 5000
    ] ;

    $coleccFunciones = [$funcion1, $funcion2, $funcion3, $funcion4] ;
    $teatro = new Teatro("Los primos", "En tu corazon", $coleccFunciones) ;

    $teatro -> cambiarNombreTeatro("El negro") ; 
    $teatro -> cambiarDireccion("Ningun lugar") ; 
    $teatro -> cambiarFuncion(3, "hola", 6000) ;
    echo $teatro ;