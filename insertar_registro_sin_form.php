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
  if(mysqli_connect_errno()){
      echo "No se puede conectar a la base de datos";
      exit();
  }
  mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
  mysqli_set_charset($conexion,"utf8");

  $consulta="INSERT INTO articulos (seccion, nombre_articulo, fecha, pais_de_origen, precio) VALUES ('CERÁMICA', 'Jarrón', '27/07/2020', 'China', 120 )";
  $resultado=mysqli_query($conexion,$consulta);
  
  
  mysqli_close($conexion);
  ?>
</body>
</html>