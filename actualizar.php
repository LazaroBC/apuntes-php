<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
  $id = $_GET["id"];
  $seccion = $_GET["seccion"];
  $nombre_articulo = $_GET["nombre_articulo"];
  $fecha = $_GET["fecha"];
  $pais_de_origen = $_GET["pais_de_origen"];
  $precio = $_GET["precio"];

  require("connect_db.php");
  $conexion=mysqli_connect($db_host,$db_usuario,$db_contra);
  if(mysqli_connect_errno()){
      echo "No se puede conectar a la base de datos";
      exit();
  }
  mysqli_select_db($conexion,$db_nombre) or die ("No se encuentra la base de datos");
  mysqli_set_charset($conexion,"utf8");

  $consulta="UPDATE `articulos`  SET `seccion`= '$seccion', `nombre_articulo` ='$nombre_articulo', `fecha`='$fecha', 
                `pais_de_origen`='$pais_de_origen', `precio`='$precio' WHERE `id`=$id";
             

  $resultado=mysqli_query($conexion,$consulta);
  if ($resultado==false) {
      echo "Error en los datos";
  } else {
      echo "Registro guardado<hr>";
      echo "<table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Sección</th>
          <th>Nombre articulo</th>
          <th>Fecha</th>
          <th>País</th>
          <th>Precio</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>$id</td>
          <td>$seccion</td>
          <td>$nombre_articulo</td>
          <td>$fecha</td>
          <td>$pais_de_origen</td>
          <td>$precio</td>
        </tr>
      </tbody>
    </table>";
  }
  
  mysqli_close($conexion);
  ?>
</body>
</html>