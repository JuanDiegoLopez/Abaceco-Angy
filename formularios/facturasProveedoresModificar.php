<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar factura proveedor</title>
		<link rel='stylesheet' href='../css/formularios.css'/>
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
		$query1 = "SELECT * from facturas_proveedor where codigo_factura=$codigo";
		$result1 = pg_query($conexion,$query1);
		if(!$result1){
			echo "Error en la consulta 1";
			exit();
		}
		$array = pg_fetch_array($result1);
		$query2 = "select * from tiendas";
		$result2 = pg_query($conexion,$query2);
		if(!$result2){
				echo "Error en la consulta 2";
				exit();
		}
		$query3 = "select * from tiendas where codigo_tienda=$array[0]";
		$result3 = pg_query($conexion,$query3);
		if(!$result3){
			echo "Error en la consulta 3";
			exit();
		}
		$tienda = pg_fetch_array($result3);

		$query4 = "select * from proveedores";
		$result4 = pg_query($conexion,$query4);
		if(!$result4){
				echo "Error en la consulta 4";
				exit();
		}
		$query5 = "select * from proveedores where codigo_proveedor=$array[1]";
		$result5 = pg_query($conexion,$query5);
		if(!$result5){
			echo "Error en la consulta 5";
			exit();
		}
		$proveedor = pg_fetch_array($result5);
		echo "
			<br>
			<br>
			<div class='contenedor'>
			<h1 align='center'> Modificar factura proveedor </h1>
			<form action='../php/modificarFacturaProveedor.php' onsubmit='return validacion()' method='post'>
				<table align='center' cellspacing=8 >
				<tr>
					<th align='right'><label for='tienda'>Tienda:</label></th>
					<td>
						<select name='tienda'>";
		while($row1 = pg_fetch_array($result2)){
			$codigo_tienda = $row1["codigo_tienda"];
			$direccion_tienda = $row1["dr_tnd"];
			if($tienda[6]===$codigo_tienda){
				echo "<option value='$codigo_tienda' selected>$direccion_tienda</option>";
			}
			else{
				echo "<option value='$codigo_tienda'>$direccion_tienda</option>";
			}
		}
		echo "
						</select>
					</td>
				</tr>
				<tr>
					<th align='right'><label for='proveedor'>Proveedor:</label></th>
					<td>
						<select name='proveedor'>";
		while($row2 = pg_fetch_array($result4)){
				$codigo_proveedor = $row2["codigo_proveedor"];
				$nombre_proveedor = $row2["nom_pro"];
				$apellido1_proveedor = $row2["ape1_pro"];
				$apellido2_proveedor = $row2["ape2_pro"];
				if($proveedor[7]===$codigo_proveedor){
					echo "<option value='$codigo_proveedor' selected>$nombre_proveedor $apellido1_proveedor $apellido2_proveedor</option>";
				}
				else{
					echo "<option value='$codigo_proveedor'>$nombre_proveedor $apellido1_proveedor $apellido2_proveedor</option>";
				}
			}
			echo "
						</select>
					</td>
				</tr>
				<tr>
					<th align='right'><label for='fecha'>Fecha:</label></th>
					<td><input type='date'name='fecha' value='$array[2]'/></td>
				</tr>
				<tr>
					<th align='right'><label for='valor'>Valor:</label></th>
					<td><input type='text'name='valor' value='$array[3]' onkeypress='return soloNumeros(event)'/></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td align='right'  colspan='2'>
						<input type='hidden' name='codigo' value='$codigo'/>
						<input class='btn' type='submit' value='Guardar'/>
						<a class='btn-a' href='../tablas/facturasProveedoresTabla.php'>Cancelar</a>
					</td>
				</tr>
			</table>
		</div>";
	?>
		</section>
		<footer class="footer">
			<p>Abaceco Angy</p>
		</footer>


  </body>
</html>
