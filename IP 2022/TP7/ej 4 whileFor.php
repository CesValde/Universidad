<?php 

    /**
     * Retorna el array
     * @return array 
     */

    function cargarMascotas() {
        // array $misMascotas, $mascota1, $mascota2, $mascota3

        $misMascotas = [] ; 

        $mascota1 = ["nombre" => "Gonzo", "edad" => 9, "tipo" => "perro"] ; 
        $mascota2 = ["nombre" => "Peggy", "edad" => 3, "tipo" => "puerco"] ; 
        $mascota3 = ["nombre" => "Harry", "edad" => 4, "tipo" => "hamster"] ; 
        $mascota4 = ["nombre" => "Rudolf", "edad" => 2, "tipo" => "perro"] ; 
        $misMascotas = [$mascota1, $mascota2, $mascota3, $mascota4] ; 

        return $misMascotas ; 
    }

    /**
     * Muestra los datos de todas las mascotas 
     * @param array $misMascotas
     */

    function mostrarMascotas($misMascotas) {
        // int $n,

        $n = 1 ; 
        
        for($i=0 ; $i<count($misMascotas) ; $i++) { 
            echo "Mascota $n: " . $misMascotas[$i]["nombre"] . " es " .  $misMascotas[$i]["tipo"] . " de " . 
            $misMascotas[$i]["edad"] . " años" . "\n" ;  
            $n++ ; 
        }
    }

    /**
     * Recorre el array hasta encontrar una mascota menor a la edad ingresada
     * @param array $misMascotas
     * @param int $edad
     * @return mixed    // (?)
     */

    function buscarPrimerMenorA($misMascotas, $edad) {
        // mixed $retorno
        // boolean $existe
        // int $i 

        $mascotaMenor = 9999 ; 
        $existe = false ; 
        $retorno = " " ; 

        while($edad < $mascotaMenor && $existe == false) {
            $mascotaMenor = $edad ; 
                for($i=0 ; $i<count($misMascotas) ; $i++) {         // elimino el for y aumento $i++
                    if($misMascotas[$i]["edad"] < $edad) {
                        $existe = true ; 
                        $retorno = $misMascotas[$i]["nombre"] ; 
                        $i = count($misMascotas) ; 
                    } else {
                        $existe = false ; 
                        $retorno = -1 ; 
                    }
                }
        }
        return $retorno ; 
    }

    /* Programa Array */
    // Muestra el array de mascotas y el nombre del primer animal menor a la edad ingresada
    // array $misMascotas
    // int $eda
    // boolean $exist

    $misMasco = cargarMascotas() ; 
    mostrarMascotas($misMasco) ; 
    echo "Ingrese edad a buscar: " ; 
    $eda = trim(fgets(STDIN)) ; 
    $exist = buscarPrimerMenorA($misMasco, $eda) ; 
    echo $exist ; 

    // print_r(cargarMascotas()) ;