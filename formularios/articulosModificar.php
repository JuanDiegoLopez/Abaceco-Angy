<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar articulo</title>
    <link rel='stylesheet' href='../css/formularios.css'>
		<link rel ="stylesheet" href="../css/navbar.css">
    <script src='../js/validacion.js'></script>
		<script type="text/javascript" src='../js/disableselection.js'></script>
  </head>
  <body>
		<header>
			<?PHP
			include('../php/navbar.php');
			navbar();
			include('../php/temporizador.php');
			temporizador();

			?>

		</header>
		<section class='main'>
			<?php
	    include('../php/conexion.php');
	    $conexion = conectarse();
	    extract($_POST);

	    $query1 = "SELECT * from articulos where codigo_articulo=$codigo";
	    $result1 = pg_query($conexion,$query1);
	    $array=pg_fetch_array($result1);


	        $query2 = "select * from categorias";
	        $result2 = pg_query($conexion,$query2);

	        $query3 = "select * from categorias where codigo_categoria = $array[2]";
	        $result3 = pg_query($conexion,$query3);
	        $categoria=pg_fetch_array($result3);


	               echo "
	                 <div class='contenedor'>
	                    <h1 align='center'> Modificar articulo </h1>
	                    <form action='../php/modificarArticulo.php' onsubmit='return validacion()' method='post'>
	                    <table align='center' cellspacing=8 >
	                      <tr>
	                        <th align='right'><label for='descripcion'>Descripcion:</label></th>
	                        <td><input type='text' name='descripcion' value='$array[0]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='precio'>Precio:</label></th>
	                        <td><input type='text' name='precio' onkeypress='return soloNumeros(event)' value='$array[1]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='categoria'>Categoria:</label></th>
	                          <td>
	                            <select name='categoria'>";

	                            while($row = pg_fetch_array($result2)) {
	                              $codigo_categoria = $row["codigo_categoria"];
	                              $descripcion = $row["descripcion_categoria"];
	                              if($categoria[0]===$codigo_categoria){
	                                echo "<option value=".$categoria[0]." selected>".$categoria[1]."</option>";
	                              }
	                              else{
	                                echo "<option value=".$codigo_categoria.">".$descripcion."</option>";
	                              }

	                            }

	                    echo " </select>
	                        </td>
	                      </tr>
	                      <tr>
	                        <td><br></td>
	                      </tr>
	                      <tr>
	                        <td align='right'  colspan='2'>
	                          <input type='hidden' name='codigo' value='$codigo'/>
	                          <input class='btn' type='submit' value='Guardar'/>
	                          <a class='btn-a' href='../tablas/articulosTabla.php'>Cancelar</a>
	                        </td>
	                     </tr>
	                    </table>
	                 </div>
	                 ";
	  ?>

		</section>
		<footer class='footer'>
			<p>Abaceco Angy</p>
		</footer>



  </body>
</html>
