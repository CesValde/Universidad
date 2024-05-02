<?php 

    /**
     * Calcula si una persona es apta para el trabajo
     * @param string $sexo
     * @param int $edad 
     * @param string $secundario
     * @return boolean
     */

    function software($secundario, $sexo, $edad) {
        // string $validacion

        if($secundario == "Si") {                   
            if($sexo == "Masculino") {                      // validacion para el hombre                   
                if($edad < 25) {
                    $validacion = true ; 
                } else {
                    $validacion = false ;
                }
            } else {                            
                $validacion = false ;                          
                    if($sexo == "Femenino") {               // validacion para la mujer                      
                        if($edad >= 30 && $edad <= 40) {
                            $validacion = true ;                                 
                        } else {
                        $validacion = false ; 
                        }   
                    } else {
                        $validacion = false ; 
                    }    
            }
        } else {
            $validacion = false ;
        }
        return $validacion ; 
    }

    /** Programa Software */
    // Muestra si la persona es seleccionada para trabajar en la empresa
    // string $sex, $secun int $eda boolean $valida

    echo "Ingrese si tiene secundario completo: " ; 
    $secun = trim(fgets(STDIN)) ;
    echo "Ingrese sexo: " ; 
    $sex = trim(fgets(STDIN)) ; 
    echo "ingrese edad: " ; 
    $eda = trim(fgets(STDIN)) ; 
    
    $valida = software($secun, $sex, $eda) ; 
        if ($valida) {
            echo "Seleccionado/a" ; 
        } else {
            echo "No cumple los requisitos" ;
        }