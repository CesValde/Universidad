<?php 

    include_once "classLibro.php" ;  

    /**
     * Almacena una coleccion de libros 
     * @return array
     */
    function coleccionLibros() {
        $coleccLibros = [] ; 

        $coleccLibros[0] = ["titulo" => "One piece" , "editorial" => "shonen jump" ,] ; 
        $coleccLibros[1] = ["titulo" => "Blue lock" , "editorial" => "shonen jump"] ; 
        $coleccLibros[2] = ["titulo" => "Oshi no ko" , "editorial" => "no jump"] ; 
        $coleccLibros[3] = ["titulo" => "prueba" , "editorial" => "Deusto"] ; 
        
        return $coleccLibros ; 
    }

    /**
     * Verifica que el libro ingresado por parametro ya este en la coleccion sino, lo agrega
     * @param 
     * @param array $coleccLibros
     * @return array
     */
    function iguales($libro, $coleccLibros) {
        $nombreLibro = $libro -> getTitulo() ;
        $editorial = $libro -> getEditorial() ; 
        $existe = false ; 
        $libroNuevo = [
            "titulo" => $nombreLibro , 
            "editorial" => $editorial ,
        ] ; 
            for($i=0 ; $i<count($coleccLibros) ; $i++) {
                if($nombreLibro == $coleccLibros[$i]['titulo']) {
                    echo "El libro ya se encuentra en la coleccion \n" ; 
                    $existe = true ;
                }
            }
        if($existe == false) {
            echo "El libro fue añadido a la coleccion \n" ; 
            array_push($coleccLibros, $libroNuevo) ;
            // print_r($coleccLibros) ; 
        }
        return $coleccLibros ; 
    }

    /**
     * Almacena en un array los libros que sean de una misma editorial
     * @param array $coleccLibros
     * @param string $pEditorial
     * @return array
     */
    function libroDeEditoriales($coleccLibros, $pEditorial) {
        $mismaEditorial[] = [
            "titulo" => "" , 
            "editorial" => "" , 
        ] ; 
        $j=0 ; 
            for($i=0 ; $i<count($coleccLibros) ; $i++) {
                if($pEditorial == $coleccLibros[$i]["editorial"]) {
                    $mismaEditorial[$j]['titulo'] = $coleccLibros[$i]['titulo'] ;  
                    $mismaEditorial[$j]['editorial'] = $coleccLibros[$i]['editorial'] ;
                    $j++ ;  
                } 
            }
        return $mismaEditorial ; 
    }

    // Test 
    $coleccLibros = coleccionLibros() ; 

    // primer objeto 
    $libro1 = new Libro(131, "Blue lock", 1997, "shonen jump", "Eiichirou", "Oda") ; 

    echo "** Primer Libro **" . "\n" ; 
    echo "Ingrese editorial: " ;
    $pEditorial = trim(fgets(STDIN)) ;
    $pertenece = $libro1 -> perteneceEditorial($pEditorial) ; 
        if($pertenece) {
            echo "El libro pertenece a la editorial $pEditorial" . "\n" ; 
        } else {
            echo "El libro no pertenece a la editorial $pEditorial" . "\n" ; 
        }
    $anios = $libro1 -> aniosDesdeEdicion() ; 
        
    echo "Cantidad de años desde que el libro fue editado $anios" . "\n" ; 
    iguales($libro1, $coleccLibros) ; 
    $mismaEditorial = libroDeEditoriales($coleccLibros, $pEditorial) ; 
    print_r($mismaEditorial) ; 
    // to string 
    echo "\n" ; 
    echo "* Datos del libro *" ; 
    echo $libro1 . "\n"; 

    // segundo objeto
    $libro2 = new Libro(132, "La semana laboral de 4 horas", 2007, "RBA libros", "Timothy", "Ferris") ; 

    echo "** Segundo Libro **" . "\n" ; 
    echo "Ingrese editorial: " ;
    $pEditorial = trim(fgets(STDIN)) ;
    $pertenece = $libro2 -> perteneceEditorial($pEditorial) ; 
        if($pertenece) {
            echo "El libro pertenece a la editorial $pEditorial" . "\n" ; 
        } else {
            echo "El libro no pertenece a la editorial $pEditorial" . "\n" ;
        }
    $anios = $libro2 -> aniosDesdeEdicion() ; 
    echo "Cantidad de años desde que el libro fue editado $anios \n" ; 
    $coleccLibros = iguales($libro2, $coleccLibros) ; 
    $mismaEditorial = libroDeEditoriales($coleccLibros, $pEditorial) ; 
    print_r($mismaEditorial) ;
    echo "\n" ;  
    echo "* Datos del libro *" ; 
    echo $libro2 . "\n" ; 

    // tercer objeto
    $libro3 = new Libro(133, "El Patron bitcoin", 2018, "Deusto", "Saifedean", "Ammous") ; 

    echo "** Tercer Libro **" . "\n" ; 
    echo "Ingrese editorial: " ;
    $pEditorial = trim(fgets(STDIN)) ;
    $pertenece = $libro3 -> perteneceEditorial($pEditorial) ; 
        if($pertenece) {
            echo "El libro pertenece a la editorial $pEditorial" . "\n" ; 
        } else {
            echo "El libro no pertenece a la editorial $pEditorial" . "\n" ;
        }
    $anios = $libro3 -> aniosDesdeEdicion() ; 
    echo "Cantidad de años desde que el libro fue editado $anios \n" ; 
    $coleccLibros = iguales($libro3, $coleccLibros) ; 
    $mismaEditorial = libroDeEditoriales($coleccLibros, $pEditorial) ; 
    print_r($mismaEditorial) ."\n" ; 
    echo "* Datos del libro *" ; 
    echo $libro3 . "\n" ; 

    print_r($coleccLibros) ;