<!doctype html>
<html>
    
    <head>
    
        <meta charset="utf-8">
        <title>Documento sin título</title>
        
        <style>
		
		table{
			width:300px;
			margin:auto;
			background-color:#FFC;
			border:2px solid #F00;
			padding:5px;
			
		}
		
		td{
			text-align:center;
			
		}
		
		
		</style>
        
    </head>
    
    <body>
    <h1 style="text-align:center"> Insertar en Base de datos</h1>
    <hr>
        <form action="pagina_insertar_pdo.php" method="post">
        <table><tr>
             <td> Sección </td><td><input type="text" name="seccion" id="seccion"></td></tr>
           <tr>
             <td>Nombre Art</td>
             <td><input type="text" name="nombre_articulo" id="nombre_articulo"></td>
           </tr>
           <tr>
             <td>Precio</td>
             <td><input type="text" name="precio" id="precio"></td>
           </tr>
           <tr>
             <td>Fecha </td>
             <td><input type="text" name="fecha" id="fecha"></td>
           </tr>
           <tr>
             <td>País de Origen</td>
             <td><input type="text" name="pais_de_origen" id="pais_de_origen"></td>
           </tr>
           <tr><td colspan="2"> <input type="submit" name="enviando" value="Insertar">
        </td></tr></table>
        </form>
    
    </body>
    
</html>