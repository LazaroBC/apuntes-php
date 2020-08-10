<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $busqueda_sec = $_GET["seccion"];
        $busqueda_pais = $_GET["pais_de_origen"];
        try {
            $base = new PDO('mysql:host=localhost; dbname=pruebas','root', '');
            echo "<script>console.log('Conexion establecida' );</script>";
            $base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base -> exec("SET CHARACTER SET UTF8");

            //$sql = "SELECT * FROM articulos WHERE nombre_articulo = ?";
            // Marcadores
            $sql = "SELECT * FROM articulos WHERE seccion = :SECC and pais_de_origen = :PAI";
            $resultado = $base -> prepare($sql);
            
            //$resultado->execute(array($busqueda));
            //Marcadores
            $resultado->execute(array(":SECC" =>$busqueda_sec, ":PAI"=>$busqueda_pais));
            echo "<table><tr>
            <th>Id: </th>
            <th>Seccion: </th>
            <th>Nombre: </th>
            <th>Fecha: </th>
            <th>País: </th>
            <th>Precio: </th>
            </tr></table>";
            while($registro= $resultado->fetch(PDO::FETCH_ASSOC)){

                echo "<table><tr>";
                echo "<td>" . $registro['id'] . "</td><td>";
                echo $registro['seccion'] . "</td><td>";
                echo $registro['nombre_articulo'] . "</td><td>";
                echo $registro['fecha'] . "</td><td>";
                echo $registro['pais_de_origen'] . "</td><td>";
                echo $registro['precio'] . "</td></tr></table>";

            }

            $resultado->closeCursor();

        }catch(Exception $e) {
            die('<h1>Error: </h1>' . $e->getMessage());
        }finally {
            $base = null;
        }


    ?>
    
</body>
</html>