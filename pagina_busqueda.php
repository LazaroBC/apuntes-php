<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    

    require("connect_db.php");
    $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);

    $usuario= mysqli_real_escape_string( $conexion, $_GET["usuario"]);
    $contrasenya=mysqli_real_escape_string( $conexion, $_GET["contrasenya"]);

    if(mysqli_connect_errno()){
        echo "No se puede conectar a la base de datos";
        exit();
    }
    mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");

    $consulta = "SELECT * FROM `usuarios` WHERE `usuario`='$usuario' AND `contrasenya`='$contrasenya'";

    echo "$consulta <hr>";
    // $consulta = "SELECT * FROM `articulos` WHERE `nombre_articulo` LIKE '%".$busqueda."%'";
    $resultado = mysqli_query($conexion,$consulta);
    
    if (mysqli_affected_rows($conexion)>0){
        while ($fila = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
            echo "Datos Usuario:<br>";
            echo "<table><tr><td>";
            
            echo $fila['usuario'] . "</td><td>";
            echo $fila['contrasenya'] . "</td><td>";
            echo $fila['telefono'] . "</td><td>";
            echo $fila['direccion'] . "</td><td></tr></table>";
    
            echo "<br>";
        }
    } else {
        echo "No existe el usuario o la contraseña";
    }
    

    mysqli_close($conexion);
    ?>
</body>
</html>