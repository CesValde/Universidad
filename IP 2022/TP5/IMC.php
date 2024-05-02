<?php
    
    /**
     * Calcula el IMC de una persona 
     * @param float $pesoM
     * @param float $alturaM
     * @return float 
     */

    function calcIMC(float $pesoM, float $alturaM) {
        // float $imcM

        $imcM = $pesoM / ($alturaM * $alturaM);
        return $imcM; 
    } 

    /** 
     * Clasifica el estado nutricional segun la OMS
     * @param float $imcX
     * @return string
     */

    function clasifIMC($imcX){
        // string $clasificacion 

        if($imcX < 18.50){
            $clasificacion = "Bajo peso";            
        } elseif($imcX >= 18.5 && $imcX <= 24.99){
            $clasificacion = "Normal";
        } elseif($imcX >= 25 && $imcX <= 29.99 ) {
            $clasificacion = "Sobrepeso";
        } elseif($imcX >= 30 && $imcX <= 34.99 ) {
            $clasificacion = "Obesidad leve";
        } elseif ( $imcX >= 35 && $imcX <= 39.99 ) { 
            $clasificacion = "Obesidad media";
        } elseif ( $imcX >= 40 ) {
            $clasificacion = "Obesidad mórbida";
        } 
        return $clasificacion;
    }
    
    /** Programa Indice de Masa Corporal */
    // Muestra el estado nutricional de una persona segun la OMS
    // Float $peso, $altura, $imc, string $clasif
    
    echo "Por favor ingrese su peso: ";
    $peso = trim(fgets(STDIN));
    echo "Por favot ingrese su altura en metros: ";
    $altura = trim(fgets(STDIN));
    $imc = calcIMC($peso, $altura) ; 
    $clasif = clasifIMC($imc);
    echo "Estado Nutricional: " . $clasif;