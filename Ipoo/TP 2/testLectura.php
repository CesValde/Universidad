<?php 

    include_once "Libro.php" ; 
    include_once "Lectura.php" ; 

    $libro1 = new Libro(131, "Blue lock", 1997, "shonen jump", "Eiichirou", "Oda") ;
    $libro2 = new Libro(132, "La semana laboral de 4 horas", 1997, "RBA libros", "Timothy", "Ferris") ;
    $coleccLibros = [$libro1, $libro2] ; 
    $lectura = new Lectura($libro1, 10, $coleccLibros) ;

    /* $paginaLibro = $lectura -> siguientePagina() ; 
    echo $paginaLibro . "\n" ; 

    $paginaAnterior = $lectura -> retrocederPagina() ;
    echo $paginaAnterior . "\n" ; 

    //$paginaActual = $lectura -> irPagina(20) ;
    //echo $paginaActual . "\n" ;

    echo $lectura ;  */

    /* $leido = $lectura -> libroLeido("A") ; 
        if($leido) {
            echo "El libro fue leido" ;
        } else {
            echo "El libro no fue leido" ; 
        }
    
    $isbn = $lectura -> darSipnosis("a") ; 
    echo $isbn ;  */

   /*  $librosLeidosAnio = $lectura -> leidosAnioEdicion(1997) ;
    print_r($librosLeidosAnio) ;  */

    $librosLeidosAutor = $lectura -> darLibrosPorAutor("Eiichirou") ; 
    print_r($librosLeidosAutor) ;