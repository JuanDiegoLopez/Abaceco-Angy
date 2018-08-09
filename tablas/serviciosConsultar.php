<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar servicios</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="../css/tablas.css"/>
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
			<br/>
			<br/>
			<div class="contenedor1">
				<form action="serviciosConsultar.php" method="post" onsubmit='return validacion()'>
					<input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo">
					<input type="submit" class='btn-b' value="Buscar"/>
					<a class='btn-enlace btn-b' href="../tablas/serviciosTabla.php">Todos</a>
				</form>
				<br>

				<?PHP
				include('../php/conexion.php');
				$conexion = conectarse();
				extract($_POST);

				$query1 = "select * from servicios where cod_serv=$codigo";
				$result1 = pg_query($conexion,$query1);
				$numrows = pg_num_rows($result1);
				if($numrows==0){
					echo "El codigo no existe";
				}

				else{
					echo "
						<div class='contenedor2'>
							<h1 align='center'>Servicio</h1>
							<table = align='center' cellspacing='8' class='tabla'>
								<tr class='datos'>
									<td>Descripcion</td>
									<td>Precio</td>
									<td></td>
									<td></td>
								</tr>";
						$array = pg_fetch_array($result1);
						echo "
							<tr>
								<td>$array[1]</td>
								<td>$array[2]</td>
								<td>
									<form action='../formularios/serviciosModificar.php' method='post'>
										<input type='hidden' name='codigo' value='$codigo'/>
										<input type='submit' value='Modificar'/>
									</form>
								</td>
								<td>
									<form action='../php/eliminarServicio.php' method='post'>
										<input type='hidden' name='codigo' value='$codigo'>
										<input type='submit' value='Eliminar'>
									</form>
								</td>
							</tr>
							</table>";
				}
				?>
				</div>
			</div>
		</section>
		<footer class="footer">
			<p>Abaceco Angy</p>
		</footer>


	</body>
</html>
