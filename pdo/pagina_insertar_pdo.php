<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $busq_seccion = $_POST["seccion"];
        $busq_nombre_articulo = $_POST["nombre_articulo"];
        $busq_precio = $_POST["precio"];
        $busq_fecha = $_POST["fecha"];
        $busq_pais = $_POST["pais_de_origen"];
        try {
            $base = new PDO('mysql:host=localhost; dbname=pruebas','root', '');
            echo "<script>console.log('Conexion establecida' );</script>";
            $base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base -> exec("SET CHARACTER SET UTF8");

            $sql = "INSERT INTO articulos (seccion, nombre_articulo, precio, fecha, pais_de_origen) 
                    VALUES (:seccion,:nombre_articulo,:precio,:fecha,:pais_de_origen)";
            
            $resultado = $base -> prepare($sql);
            
            
            $resultado->execute(array(":seccion" =>$busq_seccion, ":nombre_articulo"=>$busq_nombre_articulo, 
                                ":precio"=>$busq_precio, ":fecha"=>$busq_fecha, ":pais_de_origen"=>$busq_pais));
            

            echo "Insertado el articulo: <br>" . $busq_seccion . "<br>" .  $busq_nombre_articulo . "<br>" .  $busq_precio . 
            "<br>" .  $busq_fecha . "<br>" . $busq_pais;


            $resultado->closeCursor();

        }catch(Exception $e) {
            die('<h1>Error: </h1>' . $e->getMessage());
        }finally {
            $base = null;
        }


    ?>
    
</body>
</html>