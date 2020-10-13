<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $criterio = $_GET["buscar"];
        $busqueda =$_GET["criterio"];

        require ("connect_db.php");

        $conexion = mysqli_connect($db_host,$db_usuario,$db_contra);

        if (mysqli_connect_errno()){
            echo "Fallo al conectar a la DB.";
            exit();
        }

        mysqli_select_db($conexion,$db_nombre) or die ("No se enccuetra la DB.");

        mysqli_set_charset($conexion, "utf8");

            // Paso 1
        $sql = "SELECT `id`, `nombre_articulo`, `pais_de_origen` FROM `articulos` WHERE $busqueda=?";
            // Paso 2
        $resultado = mysqli_prepare($conexion,$sql);
            // Paso 3
        $ok = mysqli_stmt_bind_param($resultado,"s",$criterio);
            // Paso 4
        $ok = mysqli_stmt_execute($resultado);

            if ($ok == false) {
                echo "Error en consulta";
            } else {
                // Paso 5
                $ok = mysqli_stmt_bind_result($resultado,$id,$nombre_articulo,$pais_de_origen);
                // Paso 6
                echo "Articulos enmcontrados:<br><hr>";
                while(mysqli_stmt_fetch($resultado)) {
                    echo "Codigo: " . $id . "<br>Nombre: " . $nombre_articulo . "<br>País: " . $pais_de_origen . "<br>";
                }
                mysqli_stmt_close($resultado);
            }
    ?>
    
</body>
</html>