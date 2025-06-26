<?php 

include_once "Persona.php" ; 
include_once "Cuota.php" ;
include_once "Prestamo.php";
include_once "Financiera.php" ;

// Punto 1
$financiera = new Financiera("Money", "Av. Arg 1234", []);

// punto 2
$persona1 = new Persona("Pepe", "Florez", "Bs As 12", "dir@mail.com", "299 444567", 40000);
$persona2 = new Persona("Luis", "Suarez", "Bs As 123", "dir@mail.com", "299 4455", 4000);
$persona3 = new Persona("Luis", "Suarez", "Bs As 123", "dir@mail.com", "299 4455", 4000);

// Punto 2
$prestamo1 = new Prestamo(1, 50000, 5, 0.1, $persona1);
$prestamo2 = new Prestamo(2, 10000, 4, 0.1, $persona2);
$prestamo3 = new Prestamo(3, 10000, 2, 0.1, $persona3);


// punto 3 
$financiera -> incorporarPrestamo($prestamo1) ;
$financiera -> incorporarPrestamo($prestamo2) ;
$financiera -> incorporarPrestamo($prestamo3) ;

// punto 4 
echo  "\n". $financiera ; 

// punto 5 
$financiera -> otorgarPrestamoSiCalifica() ;

// punto 6 
echo $financiera ; 

// punto 7 
$objCuota = $financiera -> informarCuotaPagar(2); 

// punto 8
echo $objCuota . "\n" ; 

// punto 9 
$total = $objCuota -> darMontoFinalCuota() ;
echo $total . "\n" ;

// punto 10 
$objCuota -> setCancelada(true) . "\n" ; 

// punto 11
$objCuota = $financiera -> informarCuotaPagar(2). "\n" ; 

// punto 12 
echo $objCuota ;