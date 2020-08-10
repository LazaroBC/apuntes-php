<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
        $busq_id = $_POST["id"];
        
        try {
            $base = new PDO('mysql:host=localhost; dbname=pruebas','root', '');
            echo "<script>console.log('Conexion establecida' );</script>";
            $base -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base -> exec("SET CHARACTER SET UTF8");

            $sql = "DELETE FROM articulos WHERE id=:id";
            
            $resultado = $base -> prepare($sql);
            
            
            $resultado->execute(array(":id"=>$busq_id));
            

            echo "Eliminado el registro" . $busq_id;


            $resultado->closeCursor();

        }catch(Exception $e) {
            die('<h1>Error: </h1>' . $e->getMessage());
        }finally {
            $base = null;
        }


    ?>
    
</body>
</html>