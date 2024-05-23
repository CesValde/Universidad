<?php 

    include_once "../Persona_3.php" ;
    include_once "../Cliente_2.php" ;
    include_once "Local.php" ; 
    include_once "Venta.php" ; 
    include_once "Rubro.php" ;
    include_once "Producto.php" ;
    include_once "ProductoRegional.php" ;
    include_once "ProductoImportado.php" ;

    // para el uasort
    function cmp($a, $b) {
        return $b["cantVendidos"] - $a["cantVendidos"] ;
    }

    // test  
    $rubro1 = new Rubro("compromiso", 35) ; 
    $rubro2 = new Rubro("regalo", 55) ; 

    $monster = new ProductoImportado(1234, "Monster", 100, 2, 500, $rubro1) ; 
    $celular = new ProductoImportado(7435, "Celular", 200, 3, 50000, $rubro1) ;
    $cpu = new ProductoRegional(15, 74027, "CPU", 300, 5, 80000, $rubro2) ;
    $gpu = new ProductoRegional(10, 92624, "GPU", 400, 8, 120000, $rubro2) ;

    // colecciones 
    $coleccProducImpor = [$monster, $celular] ;
    $coleccProducRegio = [$cpu, $gpu] ; 
    $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
    $coleccVentas = [] ;

    // objeto Tienda/Local 
    $local = new Local($coleccProducImpor, $coleccProducRegio, $coleccVentas) ;

    $precioVenta = $local -> retornarImporteProducto(1234) ;
    // echo $precioVenta ;   

    // costo en productos hasta ahora en el local 
    $sumaCostos = "Costo total en productos: " . $local -> retornarCostoProductoTienda() ; 
    // echo $sumaCostos . "\n" ;

    $productoMasBarato = $local -> productoMasEcomomico($rubro1) ;
    // echo "Producto mas barato: " . $productoMasBarato ;
 
    $pc = new ProductoImportado(2748, "Pc", 40, 75, 10, $rubro1) ;
    $incorpora = $local -> incorporarProductoTienda($pc) ;
        if($incorpora) {
            echo "El producto fue agregado al local \n" ; 
        } else {
            echo "El producto ya existe en el local \n" ;
        } 

    $productoMasBarato = $local -> productoMasEcomomico($rubro1) ;
    echo "Producto mas barato: " . $productoMasBarato ;

    $precioVenta = $local -> retornarImporteProducto(1234) ;
    // echo $precioVenta . "\n" ; 
    // nuevo producto se agregra y se setean lo valores necesarios
    $precioVenta = $local -> retornarImporteProducto(2748) ;
    // echo $precioVenta ; 

    // seteo de coleccion de ventas
    $fecha = date("Y-m-d H:i:s") ;
    $cliente1 = new Cliente2("Dni", "Cesar", "Valderrama", 95947908) ;
    $ventaCelular = new Venta($fecha, $celular, 22, $cliente1) ;
    $coleccVentas[] = $ventaCelular ;
    $local -> setColeccVentas($coleccVentas) ;

    $anio = date("Y", strtotime($fecha)); 
    $coleccProdMasVendidos = $local -> informarProductosMasVendidos(2024, 2) ;
    print_r($coleccProdMasVendidos) ;

    // Ordena el array usando la función de comparación personalizada
    uasort($coleccProdMasVendidos, 'cmp');
    // permanecen los n productos dentro del array desde 0 a $n=2
    $coleccProdMasVendidos = array_slice($coleccProdMasVendidos, 0, 2) ;
    // print_r($coleccProdMasVendidos) ; 

    $promedioVentasImpor = $local -> promedioVentasImportados() ; 
    // echo $promedioVentasImpor . "\n" ;

    $lista = $local -> informarConsumoCliente('Dni', 95947908) ;
    // print_r($lista) ;

    // echo $local ;