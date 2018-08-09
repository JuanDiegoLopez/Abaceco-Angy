<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar Pensiones</title>
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
		$query1 = "SELECT * from pensiones where codigo_pension=$codigo";
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
                    <h1 align='center'> Modificar Pension </h1>
                    <form action='../php/modificarPension.php' onsubmit='return validacion()' method='post'>
                    <table align='center' cellspacing=8 >
                      <tr>
                        <th align='right'><label for='nombre'>Nombre:</label></th>
                        <td><input type='text' name='nombre' value='$array[0]'/></td>
                      </tr>
					  <tr>
                        <th align='right'><label for='direccion'>Direccion:</label></th>
                        <td><input type='text'name='direccion' value='$array[1]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='telefono'>Telefono:</label></th>
                        <td><input type='text' name='telefono' value='$array[2]' onkeypress='return soloNumeros(event)'/></td>
                      </tr>
                      <tr>
                        <td><br></td>
                      </tr>
                      <tr>
                        <td align='right'  colspan='2'>
                          <input type='hidden' name='codigo' value='$codigo'/>
                          <input class='btn' type='submit' value='Guardar'/>
                          <a class='btn-a' href='../tablas/pensionesTabla.php'>Cancelar</a>
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
