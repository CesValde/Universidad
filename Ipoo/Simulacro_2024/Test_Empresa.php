<?php 

    /* Test */
    include_once "Venta_S.php" ;
    include_once "Empresa_S.php" ;
    include_once "Cliente_S.php" ;
    include_once "Moto_S.php" ;

    $objCliente1 = new Cliente_S("Cesar", "Valderrama", true, "dni", 95497908) ;
    $objCliente2 = new Cliente_S("Jesus", "Valderrama", false, "dni", 95879886) ;

    $moto1 = new Moto_S(11, 2230000, 2022, "Benelli Imperiale 400", 85, true) ;
    $moto2 = new Moto_S(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true) ;
    $moto3 = new Moto_S(13, 999900, 2023, "Zanella Patagonian Eagle 250 ", 55, false) ;

    $coleccMotos = [$moto1, $moto2, $moto3] ;
    $coleccClientes = [$objCliente1, $objCliente2] ;
    $coleccVentas = [] ;
    $empresa = new Empresa_S("Alta Gama", "Av Argenetina 123", $coleccClientes, $coleccMotos, $coleccVentas) ;

    /* punto 5 */
    $colCodigosMoto = [11,12,13] ;
    $ventaRegistrada = $empresa -> registrarVenta($colCodigosMoto, $objCliente2) ; 
    echo $ventaRegistrada . "\n" ;

    /* punto 6 */
    $colCodigosMoto = [0] ;
    $ventaRegistrada = $empresa -> registrarVenta($colCodigosMoto, $objCliente2) ;
    echo $ventaRegistrada . "\n" ;

    /* Punto 7 */
    $colCodigosMoto = [2] ;
    $ventaRegistrada = $empresa -> registrarVenta($colCodigosMoto, $objCliente2) ;
    echo $ventaRegistrada . "\n" ;

    /* punto 8 */
    $tipo = $objCliente1 -> getTipoDoc() ; 
    $numDoc = $objCliente1 -> getNroDoc() ;
    $ventasRealizada = $empresa -> retornarVentasXCliente($tipo, $numDoc) ;
    $cadenaVentas = $empresa -> MostrarVentasXCliente($ventasRealizada);
    echo $cadenaVentas . "\n" ;

    /* punto 9 */
    $tipo = $objCliente2 -> getTipoDoc() ; 
    $numDoc = $objCliente2 -> getNroDoc() ;
    $ventasRealizada =  $empresa -> retornarVentasXCliente($tipo,$numDoc) ;
    $cadenaVentas = $empresa -> MostrarVentasXCliente($ventasRealizada) ;
    echo $cadenaVentas ;

    /* punto 10 */  
    echo $empresa . "\n" ;