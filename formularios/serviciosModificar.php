<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Servicios</title>
		<link rel='stylesheet' href='../css/formularios.css'>
		<link rel ="stylesheet" href="../css/navbar.css">
		<script src='../js/validacion.js'></script>
		<script type="text/javascript" src='../js/disableselection.js'></script>
	</head>
	<body>
		<header>
			<?php
		    include('../php/navbar.php');
		    navbar();
				include('../php/temporizador.php');
	      temporizador();
				?>
		</header>
		<section class="main">
			<?PHP
		include('../php/conexion.php');
		$conexion = conectarse();
		extract($_POST);
		$query1 = "SELECT * from servicios where cod_serv=$codigo";
		$result1 = pg_query($conexion,$query1);
		if(!$result1){
			echo "Error en la consulta 1";
			exit();
		}
		$array = pg_fetch_array($result1);
               echo "
                 <br>
                 <br>
                 <div class='contenedor'>
                    <h1 align='center'> Modificar Servicio </h1>
                    <form action='../php/modificarServicio.php' onsubmit='return validacion()' method='post'>
                    <table align='center' cellspacing=8 >
                      <tr>
                        <th align='right'><label for='descripcion'>Descripción:</label></th>
                        <td><input type='text' name='descripcion' value='$array[1]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='valor'>Precio:</label></th>
                        <td><input type='text' name='valor' value='$array[2]' onkeypress='return soloNumeros(event)'/></td>
                      </tr>
                      <tr>
                        <td><br></td>
                      </tr>
                      <tr>
                        <td align='right'  colspan='2'>
                          <input type='hidden' name='codigo' value='$codigo'/>
                          <input class='btn' type='submit' value='Guardar'/>
                          <a class='btn-a' href='../tablas/serviciosTabla.php'>Cancelar</a>
                        </td>
                     </tr>
                    </table>
                 </div>
                 ";
  ?>
		</section>
		<footer class="footer">
	    <p>Abaceco Angy</p>
	  </footer>



  </body>
</html>
