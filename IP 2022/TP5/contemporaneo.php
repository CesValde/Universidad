<?php 

    /** Programa Contemporaneos */
    //Calcula si 2 o 3 personas son comntemporaneas
    // int $edad1, $edad2, $edad3  string $nombre1, $nombre2, $nombre3

    echo "Ingrese el nombre de la primera persona: " ; 
    $nombre1 = trim(fgets(STDIN)) ; 
    echo "Ingrese la edad de la primera persona: " ; 
    $edad1 = trim(fgets(STDIN)) ; 
    echo "Ingrese el nombre de la segunda persona: " ; 
    $nombre2 = trim(fgets(STDIN)) ; 
    echo "Ingrese la edad de la segunda persona: " ; 
    $edad2 = trim(fgets(STDIN)) ; 
    echo "Ingrese el nombre de la tercera persona: " ; 
    $nombre3 = trim(fgets(STDIN)) ;
    echo "Ingrese la edad de la tercera persona: " ; 
    $edad3 = trim(fgets(STDIN)) ; 
        if($edad1 == $edad2) {
            echo $nombre1 . " y " . $nombre2 . " son contemporaneos" ; 
        } elseif($edad1 == $edad3) {
            echo $nombre1 . " y " . $nombre3 . " son contemporaneos" ; 
        } elseif($edad2 == $edad3) {
            echo $nombre2 . " y " . $nombre3 . " son contemporaneos" ; 
        } else {
            echo "Niguno es contemporaneo" ; 
        }