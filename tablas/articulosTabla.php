<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Tabla articulos</title>
		<link rel="stylesheet" href="../css/tablas.css">
		<link rel ="stylesheet" href="../css/navbar.css">
		<script src='../js/validacion.js'></script>
		<script type="text/javascript" src='../js/disableselection.js'></script>
	</head>
	<body>
		<header>
			<?php
				include('../php/temporizador.php');
		  	temporizador();
				include('../php/navbar.php');
				navbar();
			 ?>
		</header>
		<section class='main'>

		<div class="contenedor1">
			<?PHP
			session_start();
			if(($_SESSION['tipo']=='admin') or ($_SESSION['tipo']=='empleado')){
				echo "
				<form action='articulosConsultar.php' onsubmit='return validacion()' method='post'>
					<input  placeholder='Codigo' type='text' onkeypress='return soloNumeros(event)' class='input' name='codigo'/>
					<input  class='btn-b' type='submit' value='Buscar'/>
					<a class='btn-enlace btn-b' href='../formularios/articulosAgregar.php'>Agregar</a>
				</form>
				<br>";
			}
				?>
			 <br/>
			<div class="contenedor2">
				<h1 align="center">Articulos</h1>
				<table align="left" class="tabla">
					<tr class="datos">
						<td>Codigo</td>
						<td>Descripcion</td>
						<td>Precio</td>
						<td>Categoria</td>
					</tr>
					<?PHP
					include ('../php/conexion.php');
					$conn = conectarse();
					$sql1 = "select * from articulos";
					$result = pg_query($conn,$sql1);
					if(!$result){
						echo "Error en la consulta 1";
						exit();
					}

					while($vec=pg_fetch_array($result)){
						$sql2 = "select descripcion_categoria from categorias where codigo_categoria = $vec[2]";
						$result2 = pg_query($conn,$sql2);
						if(!$result2){
							echo "Error en la consulta 2";
							exit();
						}
						$categoria = pg_fetch_array($result2);
						echo "<tr>
								<td>$vec[3]</td>
								<td>$vec[0]</td>
								<td>$$vec[1]</td>
								<td>$categoria[0]</td>
							  </tr>";
					}
					?>
				</table>
			</div>
		</div>

		</section>
		<footer class='footer'>
			<p>Abaceco Angy</p>
		</footer>

	</body>
</html>
