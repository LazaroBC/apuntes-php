<?php

    require "BusquedaElementos.php";
    $productos = new BusquedaElementos();
    $array_elementos = $elementos->getElementos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    foreach ($array_elementos as $producto) {

        echo "<table><tr>";
            echo "<td>" . $producto['id'] . "</td><td>";
            echo $producto['seccion'] . "</td><td>";
            echo $producto['nombre_articulo'] . "</td><td>";
            echo $producto['fecha'] . "</td><td>";
            echo $producto['pais_de_origen'] . "</td><td>";
            echo $producto['precio'] . "</td></tr></table>";

    }
?>
    
</body>
</html>