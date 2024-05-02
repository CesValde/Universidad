<?php 
    
    // Programa Radio
    /* Calcula el diámetro y el perímetro de la circunferencia de radio R, la superficie del 
        círculo de radio R, el volumen y la superficie de la esfera de radio R */
    // float $radio, $diametro, $perimetro, $superCirc, $volumenEsf, $superfEsf 

    echo "Ingrese el valor del radio: " ; 
    $radio = trim(fgets(STDIN)) ; 
    $diametro = 2 * $radio ; 
    $perimetro = 2 * M_PI * $radio ;
    $superCirc = M_PI * ($radio * $radio ) ;
    $volumenEsf = (4/3) * M_PI * ($radio * $radio * $radio) ;
    $superfEsf = 4 * M_PI * ($radio * $radio) ;

    echo "El diametro de la circunferencia es: " . $diametro . "\n"  ;
    echo "El perimetro de la circunferencia es: " . $perimetro . "\n"  ;
    echo "La superficie de la circunferencia es: " . $superCirc . "\n"  ;
    echo "El volumen de la esfera es: " . $volumenEsf . "\n"  ;
    echo "La superficie de la esfera es: " . $superfEsf  . "\n"  ;