<?php 

    /**
     * Calcula la cantidad de alumnos aprobados por materia
     * @param 
     * @return 
     */
    function cantAlumnosApro($cantMaterias, $cantAlumnos) {
        //

       $cantAlumnosAproMaterias = [] ; 

       // $cantAlumnosAproMaterias[0] = ["bdd" => "", "materia" => "", "materia" => "", "materia" => "", "materia" => ""] ;
        
        
        $cantAlumnosAproMaterias[0] = ["" => 0] ; 
        $cantAlumnosAproMaterias[1] = ["" => 0] ;
        $cantAlumnosAproMaterias[2] = ["" => 0] ;
        $cantAlumnosAproMaterias[3] = ["" => 0] ;
        $cantAlumnosAproMaterias[4] = ["" => 0] ;


        for($i=0 ; $i<$cantMaterias ; $i++) {
            echo "Ingrese una materia: " ; 
            $materia = trim(fgets(STDIN)) ; 
            $cantAlumnosAproMaterias[$i] = $materia ; 
            for($j=0 ; $j<$cantAlumnos ; $j++) {
                echo "Ingrese la nota del alumno: " ; 
                $notaAlum = trim(fgets(STDIN)) ;
                    if($notaAlum >= 7) {
                        // $cantAlumnosAproMaterias[$i] = $materia ; 
                        $cantAlumnosAproMaterias[$j][]++ ;                      // hacer lo del array turismo ingresa base de datos y que la clave sea basededatos
                    }
            }
            
        }
        return $cantAlumnosAproMaterias ; 
    }

    /**
     * Dada una materia retorna un arreglo con los alumnos que aprobaron esa materia.
     * @param 
     * @return 
     */
    function nombreAlumnosApro($materia, $cantAlumnos) {
        //

        $alumnosAprobados = [] ; 

        for($i=0 ; $i<$cantAlumnos ; $i++) {
            echo "" ; 
            if($notaAlumno >= 7) {
                 ; 
            }
        }
        return $alumnosAprobados ; 
    }









    /* Programa Principal */
    //
    // 

    $datosAlumnos = [] ; 
    $alumnosAprobados = 0 ; 
    $porcentaje = 0 ; 
    $cantAlumnos = 0 ; 
    $mayorNota = -1 ; 
    $notaAlumno = 0 ; 

    $datosAlumnos = [
        "nrolegajo" => "" , 
        "codigoMateria" => "" , 
        "notaObtenida" => ""
    ] ; 


   



    echo "Ingrese cantidad de materias a evaluar: " ; 
    $cantMaterias = trim(fgets(STDIN)) ; 
    echo "Ingrese cantidad de alumnos: " ; 
    $cantAlumnos = trim(fgets(STDIN)) ;




    // bien
    $cantAlumnosAproMaterias = cantAlumnosApro($cantMaterias, $cantAlumnos) ; 
    print_r($cantAlumnosAproMaterias) ; 








    for($i=0 ; $i<$cantMaterias ; $i++) {
        echo "Ingrese una materia: " ; 
        $materia = trim(fgets(STDIN)) ; 
        echo "Ingrese la cantidad de alumnos que cursaron la materia: " ; 
        $cantAlumnos = trim(fgets(STDIN)) ;
            for($j=0 ; $j<$cantAlumnos ; $j++) {
                

                if($notaAlumno > $mayorNota) {
                    $mayorNota = $notaAlumno ; 
                }
            }

      



        $porcentaje = 0 ; 
    }
 
