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

    $consulta = "SELECT * FROM `articulos` WHERE `nombre_articulo` LIKE '%".$busqueda."%'";
    $resultado = mysqli_query($conexion,$consulta);

    while ($fila = mysqli_fetch_assoc($resultado)){

        // echo "<table><tr><td>";

        echo "<form action='actualizar.php' method='get'>";

        echo "<input type='text' name='id' value='" . $fila['id'] . "'> <hr>";
        echo "<input type='text' name='seccion' value='" . $fila['seccion'] . "'> <hr>";
        echo "<input type='text' name='nombre_articulo' value='" . $fila['nombre_articulo'] . "'> <hr>";
        echo "<input type='text' name='fecha' value='" . $fila['fecha'] . "'> <hr>";
        echo "<input type='text' name='pais__de_origen' value='" . $fila['pais_de_origen'] . "'> <hr>";
        echo "<input type='text' name='precio' value='" . $fila['precio'] . "'> <hr>";

        echo "<input type='submit' name='enviando' value='actualizar'>";
        echo "</form>";
        echo "<hr><hr>";
        // echo $fila['id'] . "</td><td>";
        // echo $fila['seccion'] . "</td><td>";
        // echo $fila['nombre_articulo'] . "</td><td>";
        // echo $fila['fecha'] . "</td><td>";
        // echo $fila['pais_origen'] . "</td><td>";
        // echo $fila['precio'] . "</td>";
        
    }
    ?>
</body>
</html>