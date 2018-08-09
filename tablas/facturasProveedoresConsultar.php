<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Consultar facturas proveedores</title>
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
				<form action="facturasProveedoresConsultar.php" method="post" onsubmit='return validacion()'>
					<input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo"/>
					<input type="submit" class='btn-b' value="Buscar"/>
					<a class='btn-enlace btn-b' href="../tablas/facturasProveedoresTabla.php">Todos</a>
				</form>
				<br>

				<?PHP
				include('../php/conexion.php');
				$conexion = conectarse();
				extract($_POST);

				$query1 = "select * from facturas_proveedor where codigo_factura=$codigo";
				$result1 = pg_query($conexion,$query1);
				$numrows = pg_num_rows($result1);
				if($numrows==0){
					echo "El codigo no existe";
				}

				else{
					echo "
						<div class='contenedor2'>
							<h1 align='center'>Facturas Proveedores</h1>
							<table = align='center' cellspacing='8' class='tabla'>
								<tr class='datos'>
									<td>Tienda</td>
									<td>Proveedor</td>
									<td>Fecha</td>
									<td>Valor</td>
									<td></td>
									<td></td>
								</tr>";
						$array = pg_fetch_array($result1);
						$query2 = "select * from tiendas where codigo_tienda=$array[0]";
						$result2 = pg_query($conexion,$query2);
						if(!$result2){
							echo "Error en la consulta 2";
							exit();
						}
						$tienda = pg_fetch_array($result2);

						$query3 = "select * from proveedores where codigo_proveedor=$array[1]";
						$result3 = pg_query($conexion,$query3);
						if(!$result3){
							echo "Error en la consulta 3";
							exit();
						}
						$proveedor = pg_fetch_array($result3);

						echo "
							<tr>
								<td>$tienda[2]</td>
								<td>$proveedor[1] $proveedor[2] $proveedor[3]</td>
								<td>$array[2]</td>
								<td>$array[3]</td>
								<td>
									<form action='../formularios/facturasProveedoresModificar.php' method='post'>
										<input type='hidden' name='codigo' value='$codigo'/>
										<input type='submit' value='Modificar'/>
									</form>
								</td>
								<td>
									<form action='../php/eliminarFacturaProveedor.php' method='post'>
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
