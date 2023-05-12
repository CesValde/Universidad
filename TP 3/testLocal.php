<?php 

    include_once "Persona_3.php" ;
    include_once "Cliente_2.php" ;
    include_once "Local.php" ; 
    include_once "Venta.php" ; 
    include_once "Rubro.php" ;
    include_once "Producto.php" ;
    include_once "ProductoRegional.php" ;
    include_once "ProductoImportado.php" ;

    // test 

    // objetos rubros 
    $rubro1 = new Rubro("conservas", 35) ; 
    $rubro2 = new Rubro("regalo", 55) ; 

    // objetos Prodcutos 

    // estos objetos tienen que ser new productoRegional // Importado ???
    $monster = new ProductoImportado(1234, "Monster", 100, 2, 500, $rubro1) ; 
    $celular = new ProductoImportado(7435, "Celular", 200, 3, 50000, $rubro1) ;
    $cpu = new ProductoRegional(15, 74027, "CPU", 300, 5, 80000, $rubro2) ;             // 00033 me sale numero raro con un echo
    $gpu = new ProductoRegional(10, 92624, "GPU", 400, 8, 120000, $rubro2) ;

    // colecciones 
    $coleccProducImpor = [$monster, $celular] ;
    $coleccProducRegio = [$cpu, $gpu] ; 
    // modificar 
    $coleccProductos = array_merge($coleccProducImpor, $coleccProducRegio) ;
    $coleccVentas = [] ;

    // objeto Tienda/Local 
    $local = new Local($coleccProducImpor, $coleccProducRegio, $coleccVentas) ;

    // precio de venta de cada producto 
        for($i=0 ; $i<count($coleccProductos) ; $i++) {
            $codigoProducto = $coleccProductos[$i] -> getCodigoBarra() ;
            $precioVenta = $local -> retornarImporteProducto($codigoProducto) ; 
                if($precioVenta == -1) {
                    echo "El codigo de barra o producto no existe \n" ; 
                } else {
                    echo "Precio de venta de: " . $coleccProductos[$i] -> getDescripcion() . " " . $precioVenta . "\n" ;
                }
        }
           

    // costo en productos hasta ahora en el local 
    $sumaCostos = "Costo total en productos: " . $local -> retornarCostoProductoLocal() ; 
    echo $sumaCostos . "\n" ;

    // primer test
    // echo $local ; 
    
    // ejercicio listo lo de abajo al pedo ya no es tan al pedo JAJAJA

    $productoMasBarato = $local -> productoMasEcomomico($rubro1) ;
    echo "Producto mas barato: " . $productoMasBarato . "\n" ;

    // objeto Producto 
    $pc = new Producto(2748, "Pc", 40, 75, 800000, $rubro1) ;
    $incorpora = $local -> incorporarProductoLocal($pc) ;
        if($incorpora) {
            echo "El producto fue agregado al local \n" ; 
        } else {
            echo "El producto ya existe en el local \n" ;
        }


    /* 
        Hacer precio de venta de los productos. 'El precio de venta de un producto se calcula 
        sobre el precio de compra, más el porcentaje de ganancia en basea su rubro, más el 
        porcentaje de IVA que se aplica al producto' . 
    */




    $fecha = "9/05/2023" ;
    // objeto Cliente
    $cliente1 = new Cliente(8675, "Cesar", "Valderrama", 95947908) ;
    //objeto Venta  
    // agregar $cantProductos y setear con la resta de cantProductos ??
    // se resta el stock y setea
    $ventaCelular = new Venta($fecha, $celular, $cliente1) ;
    array_push($coleccVentas, $ventaCelular) ;
    $local -> setColeccVentas($coleccVentas) ;
    


    // precio venta de un producto 
    $precioVenta = $local -> darPrecioVenta($gpu) ; // 120k
    echo "Precio de " . $gpu -> getDescripcion() . ": " . $precioVenta . "\n" ; 

    // precio venta de un producto 
    $precioVenta = $local -> darPrecioVenta($celular) ;
    echo "Precio de " . $celular -> getDescripcion() . ": " . $precioVenta . "\n" ; 




    // test final
    echo $local ; 