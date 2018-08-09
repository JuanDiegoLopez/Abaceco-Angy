<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8"/>
		<title>Tabla Tiendas</title>
		<link rel="stylesheet" href="../css/tablas.css">
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
			<div class="contenedor1">
				<?PHP
	      session_start();
	      if($_SESSION['tipo']=='admin'){
	        echo "
	        <form action='tiendasConsultar.php' onsubmit='return validacion()' method='post'>
	          <input  placeholder='Codigo' type='text' onkeypress='return soloNumeros(event)' class='input' name='codigo'/>
	          <input  class='btn-b' type='submit' value='Buscar'/>
	          <a class='btn-enlace btn-b' href='../formularios/tiendasAgregar.php'>Agregar</a>
	        </form>
	        <br>";
	      }
	        ?>
				 <br>
				<div class="contenedor2">
					<h1 align="center">Tiendas</h1>
					<table align="center" cellspacing="8" class="tabla">
						<tr class="datos">
							<td>Codigo</td>
							<td>Telefono</td>
							<td>Numero de empleados</td>
							<td>Direccion</td>
							<td>Ciudad</td>
						</tr>
						<?PHP
						include ('../php/conexion.php');
						$conn = conectarse();
						$sql1 = "select * from tiendas";
						$result = pg_query($conn,$sql1);
						if(!$result){
							echo "Error en la consulta 1";
							exit();
						}
						while($vec=pg_fetch_array($result)){
							$sql2 = "select nombre_ciudad from ciudades where codigo_ciudad = $vec[3]";
							$result2 = pg_query($conn,$sql2);
							if(!$result2){
								echo "Error en la consulta 2";
								exit();
							}
							$ciudad = pg_fetch_array($result2);
							echo "<tr>
									<td>$vec[4]</td>
									<td>$vec[0]</td>
									<td>$vec[1]</td>
									<td>$vec[2]</td>
									<td>$ciudad[0]</td>
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
