# apuntes_php
## Mysqli_stmt ##
La principal función de este tipo de consultas es evitar la inyección SQL.
1.- Crear la sentencia SQL sustituyendo los valores de criterio por el simbolo ?
	*$sql="SELECT * FROM PRODUCTOS WHERE pais_de_origen=?"

2.- Preparamos la consulta con la función mysqli_preapre(). Esta función requiere de dos parámetros:
    - El objeto de conexión.
    - La sentencia sql.

    *$resultado=mysqli_prepare($conexion,$sql) 
    - Esta función devuelve un objeto de tipo mysqli_stmt.

3.- Unimos los parámetros a la sentencia sql. De esto se encartga la función mysql_stmt_bind_param(). Devuelve true o false.
    Esta función requiere de tres parámetros:
    - El objeto mysql_stmt(paso 2).
    - El tipo de dato que se utilizará com criterio en sql.
    	- Tipo texto "s".
    	- Tipo entero "i".
    	- Tipo double "d".
    	- La variable es un blob y se envia por paquetes "b".

    - La variable con el criterio.

4.- Ejecutar la consulta con la función mysqli_stmt_execute(). Esta función devuelve true o false.
	Necesita como parámetro el objetto mysqli_stmt.

5.- Asociar variables al rsultado de la consulta. Esto lo conseguimos con la función mysqli_stmt_bin_result(). Devuelve true o false.
    Necesita como parámetros el objeto mysql_stmt y tantas variables con columnas en consulta sql. 

6.- Lectura de valores. Para ello utilizamos la función mysql_stmt_fetch.
    Pide como parámetro el objeto mysqli_stmt.
    - Cerrar con mysqli_stmt_close(objeto mysql_stmt).


    ```php
        <?php

        $criterio = $GET_["buscar"];

        require ("connect_db.php");

        $conexion = mysqli_connect($db_host,$db_usuario,$db_contra);

        if (mysqli_connect_errno()){
            echo "Fallo al conectar a la DB.";
            exit();
        }

        mysqli_select_db($conexion,$db_nombre) or die ("No se enccuetra la DB.");

        mysqli_set_charset($conexion, "utf8");

            // Paso 1
        $sql = "SELECT `id`, `nombre_articulo`, `pais_de_origen` FROM PRODUCTOS WHERE pais_de_origen=?";
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

    ```


    https://www.php.net/manual/es/book.pdo.php
    

