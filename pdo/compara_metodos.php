<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        $conexion = new mysqli("localhost", "root", "", "pruebas");

        if ($conexion -> connect_errno) {
            echo "No se puede conectar a la db. Error: " . $conexion->connect_errno;
        }

        // mysqli_set_charset($conexion, "utf8");

        $conexion -> set_charset("utf8");

        $sql = "SELECT * FROM articulos";

        // $resultados = mysqli_query($conexion, $sql);

        $resultado = $conexion -> query($sql);
        if ($conexion -> error) {
            die ($conexion -> error);
        }

        // while($fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC)){};

        while ($fila = $resultado -> fetch_assoc()){
            echo "<table><tr><td>";
        
            echo $fila['id'] . "</td><td>";
            echo $fila['seccion'] . "</td><td>";
            echo $fila['nombre_articulo'] . "</td><td>";
            echo $fila['fecha'] . "</td><td>";
            echo $fila['pais_de_origen'] . "</td><td>";
            echo $fila['precio'] . "</td>";
            //while ($fila = $resultado -> fetch_array()){
        
            // echo "<table><tr><td>";
            // 
            // echo $fila[0] . "</td><td>";
            // echo $fila[1] . "</td><td>";
            // echo $fila[2] . "</td><td>";
            // echo $fila[3] . "</td><td>";
            // echo $fila[4] . "</td><td>";
            // echo $fila[5] . "</td>";
            //}
        } 


    
        //mysqli_close($conexion);
        $conexion->close();

    ?>
</body>
</html>