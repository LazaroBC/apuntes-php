<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $busqueda=$_GET["buscar"];
    require("connect_db.php");
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);
    if(mysqli_connect_errno()){
        echo "No se puede conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");

    $consulta = "SELECT * FROM `articulos` WHERE `nombre_articulo` = '$busqueda'";

    echo "$consulta <hr>";
    // $consulta = "SELECT * FROM `articulos` WHERE `nombre_articulo` LIKE '%".$busqueda."%'";
    $resultado = mysqli_query($conexion,$consulta);

    while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
        echo "<table><tr><td>";
        
        echo $fila['id'] . "</td><td>";
        echo $fila['seccion'] . "</td><td>";
        echo $fila['nombre_articulo'] . "</td><td>";
        echo $fila['fecha'] . "</td><td>";
        echo $fila['pais_de_origen'] . "</td><td>";
        echo $fila['precio'] . "</td>";


    }

    mysqli_close($conexion);
    ?>
</body>
</html>