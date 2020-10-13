<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 300px;
            margin: auto;
            background-color: #ffc;
            border: 2px solid red;
            padding: 5px;
        }

        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="pagina_busqueda_pdo.php" method="get">
    <table><tr><td>
        Sección: </td><td><input type="text" name="seccion"></td>
        <tr><td>País: </td><td><input type="text" name="pais_de_origen"></td><td>
        <tr><td colspan="2"><input type="submit" name="enviando" value="Enviar">
</td></tr></table>
    </form>
</body>
</html>