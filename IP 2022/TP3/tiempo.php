<?php
    
    // Programa Tiempo
    // Recibe una cantidad de seg y los muestra como horas, minutos y segundos
    // float $x, $horas, $min, $seg
    
    echo "ingrese x cantidad de segundos: ";
    $x = trim(fgets(STDIN));
    $horas = (int) ($x/3600);
    $min = (int) ((($x/3600)-$horas)*60);
    $seg = (int) (((($x/3600)-$horas)*60-$min)*60);
    echo $x . " segundos equivalen a: " . $horas . " horas con " . $min .  " minutos y " . $seg . " segundos";