<?php 

    /** 
     * Imprime canios
     */

    function canio() {
        echo " +----+              |               +----+ " ; 
    }

    /** 
     * Imprime campo
     */

    function campo() {
        echo " |                   |                    | " ; 
    }

    /** 
     * Imprime linea media
     */

    function lineaMedia() {
        echo " |    |              |               |    |"; 
    }

    /**
     * Imprime linea de banda 
     */
    function lineaBanda() {
        echo " +-------------------+--------------------+" ; 
    }

    /* Programa Principal */ 
    // Imprime una cancha de futbol 

    echo lineaBanda() . "\n"; 
    echo campo() . "\n" ; 
    echo campo() . "\n" ; 
    echo canio() . "\n" ; 
    echo lineaMedia() . "\n" ; 
    echo lineaMedia() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo canio() . "\n" ; 
    echo campo() . "\n" ; 
    echo campo() . "\n" ; 
    echo lineaBanda() . "\n" ; 