<?php

    include_once "Producto.php" ;
    include_once "Venta.php" ;
    include_once "Item.php" ;
    include_once "Tienda.php" ;

    /* Test */
    
    $producto1 = new Producto(0001, "abc", "rojo", 30, "rojo brilloso", 3) ;    // pedido en el recu
    $producto2 = new Producto(0002, "def", "azul", 30, "azul brilloso", 5) ;    // pedido en el recu
    $producto3 = new Producto(0003, "ghi", "verde", 30, "verde brilloso", 20) ;
    $producto4 = new Producto(0004, "zxy", "morado", 30, "morado brilloso", 30) ;
    $coleccProductos = [$producto1, $producto2, $producto3, $producto4] ;

    $tienda = new Tienda("La anonima", "Centro", 12345) ;
    $tienda -> setColeccProductos($coleccProductos) ;
    $array = [
        [
            "codigoBarra" => 0001, 
            "cantVender" => 5 
        ],
        [
            "codigoBarra" => 0002,
            "cantVender" => 2 
        ],
        [
            "codigoBarra" => 0003,
            "cantVender" => 4
        ]
    ];

    $tienda -> realizarVenta($array) ;
    echo $tienda ;