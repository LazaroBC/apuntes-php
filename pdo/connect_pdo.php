<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        try {
            $base = new PDO('mysql:host=localhost; dbname=pruebas','root', '');
            echo 'Conexión establecida';
        }catch(Exception $e) {
            die('<h1>Error: </h1>' . $e->getMessage());
        }finally {
            $base = null;
        }

    ?>
</body>
</html>