<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Tabla Facturas Clientes</title>
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
		<section class="main">
			<br>
		<div class="contenedor1">
			<form action="facturasClientesConsultar.php" onsubmit="return validacion()" method="post">
	      <input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo"/>
	      <input type="submit" class='btn-b' value="Buscar"/>
	      <a class='btn-enlace btn-b'href="../formularios/facturasClientesAgregar.php">Agregar</a>
	    </form>
			<br>
			<div class="contenedor2">
				<h1 align="center">Facturas Clientes</h1>
				<table align="center" cellspacing="8" class="tabla">
					<tr class="datos">
						<td>Codigo</td>
						<td>Empleado</td>
						<td>Cliente</td>
						<td>Fecha</td>
						<td>Valor</td>
					</tr>
					<?PHP
					include ('../php/conexion.php');
					$conn = conectarse();
					$sql1 = "select * from facturas_cliente";
					$result = pg_query($conn,$sql1);
					if(!$result){
						echo "Error en la consulta 1";
						exit();
					}
					while($vec=pg_fetch_array($result)){

						$sql2 = "select * from empleados where cod_emp = $vec[0]";
						$result2 = pg_query($conn,$sql2);
						if(!$result2){
							echo "Error en la consulta 2";
							exit();
						}
						$empleado = pg_fetch_array($result2);

						$sql3 = "select * from clientes where codigo_cliente = $vec[1]";
						$result3 = pg_query($conn,$sql3);
						if(!$result3){
							echo "Error en la consulta 3";
							exit();
						}
						$cliente = pg_fetch_array($result3);
						echo "<tr>
								<td>$vec[4]</td>
								<td>$empleado[2] $empleado[3] $empleado[4]</td>
								<td>$cliente[1] $cliente[2] $cliente[3]</td>
								<td>$vec[2]</td>
								<td>$$vec[3]</td>
							  </tr>";
					}
					?>
				</table>
			</div>
		</div>

		</section>
		<footer class="footer">
			<p>Abaceco Angy</p>
		</footer>


	</body>
</html>
