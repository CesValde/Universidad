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
        echo " |         |         |           |        | " ; 
    }

    /**
     * Imprime linea de banda 
     */
    function lineaBanda() {
        echo " +-------------------+--------------------+" ; 
    }

    /* Programa Cancha */ 
    // Imprime una cancha de tenis 

    echo lineaBanda() . "\n" ; 
    echo campo() . "\n" ; 
    echo lineaBanda() . "\n" ;
    echo lineaMedia() . "\n" ; 
    echo lineaMedia() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo lineaBanda() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo lineaMedia() . "\n" ;
    echo lineaBanda() . "\n" ;
    echo campo() . "\n" ;
    echo lineaBanda() . "\n" ;