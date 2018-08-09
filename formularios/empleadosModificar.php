<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Modificar empleado</title>
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
		$query1 = "SELECT * from empleados where cod_emp=$codigo";
		$result1 = pg_query($conexion,$query1);
		if(!$result1){
			echo "Error en la consulta 1";
			exit();
		}
		$array = pg_fetch_array($result1);
		$query2 = "select * from eps";
		$result2 = pg_query($conexion,$query2);
		if(!$result2){
				echo "Error en la consulta 2";
				exit();
		}
        $query3 = "select * from eps where codigo_eps=$array[10]";
		$result3 = pg_query($conexion,$query3);
		if(!$result3){
			echo "Error en la consulta 3";
			exit();
		}
		$eps = pg_fetch_array($result3);

		$query4 = "select * from tiendas";
		$result4 = pg_query($conexion,$query4);
		if(!$result4){
				echo "Error en la consulta 4";
				exit();
		}
		$query5 = "select * from tiendas where codigo_tienda=$array[11]";
		$result5 = pg_query($conexion,$query5);
		if(!$result5){
			echo "Error en la consulta 5";
			exit();
		}
		$tienda = pg_fetch_array($result5);

		$query6 = "select * from ciudades";
		$result6 = pg_query($conexion,$query6);
		if(!$result6){
				echo "Error en la consulta 6";
				exit();
		}
		$query7 = "select * from ciudades where codigo_ciudad=$array[12]";
		$result7 = pg_query($conexion,$query7);
		if(!$result7){
			echo "Error en la consulta 7";
			exit();
		}
		$ciudad = pg_fetch_array($result7);
               echo "
                 <br>
                 <br>
                 <div class='contenedor'>
                    <h1 align='center'> Modificar empleado </h1>
                    <form action='../php/modificarEmpleado.php' onsubmit='return validacion()' method='post'>
                    <table align='center' cellspacing=8 >
                      <tr>
                        <th align='right'><label for='cedula'>Cedula:</label></th>
                        <td><input type='text' name='cedula' value='$array[1]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='nombre'>Nombre:</label></th>
                        <td><input type='text' name='nombre' value='$array[2]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='ape1'>Primer apellido:</label></th>
                        <td><input type='text'name='ape1' value='$array[3]'/></td>
                      </tr>
					  <tr>
                        <th align='right'><label for='ape2'>Segundo apellido:</label></th>
                        <td><input type='text'name='ape2' value='$array[4]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='correo'>Correo:</label></th>
                        <td><input type='text' id='correo' name='correo' onchange='validarEmail(this.value);' onkeydown='validarEmail(this.value);' value='$array[5]'/></td>
                        <td><img width='25' id='valido' class='valido'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='direccion'>Direccion:</label></th>
                        <td><input  type='text' name='direccion' value='$array[6]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='telefono'>Telefono:</label></th>
                        <td><input type='text' name='telefono'  onkeypress='return soloNumeros(event)' value='$array[7]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='nacimiento'>Fecha de nacimiento:</label></th>
                        <td><input type='date' name='nacimiento' value='$array[8]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='vinculacion'>Fecha de vinculacion:</label></th>
                        <td><input type='date' name='vinculacion' value='$array[9]'/></td>
                      </tr>
					  <tr>
						<th align='right'><label for='eps'>EPS:</label></th>
						<td>
							<select name='eps'>";
				while($row1 = pg_fetch_array($result2)){
					$codigo_eps = $row1["codigo_eps"];
					$nom_eps = $row1["nom_eps"];
					if($eps[3]===$codigo_eps){
						echo "<option value=".$codigo_eps." selected>".$nom_eps."</option>";
					}
					else{
						echo "<option value=".$codigo_eps.">".$nom_eps."</option>";
					}
				}
				echo "
							</select>
						</td>
					</tr>
					<tr>
						<th align='right'><label for='tienda'>Tienda:</label></th>
						<td>
							<select name='tienda'>";
				while($row2 = pg_fetch_array($result4)){
					$codigo_tienda = $row2["codigo_tienda"];
					$dr_tnd = $row2["dr_tnd"];
					if($tienda[6]===$codigo_tienda){
						echo "<option value=".$codigo_tienda." selected>".$dr_tnd."</option>";
					}
					else{
						echo "<option value=".$codigo_tienda.">".$dr_tnd."</option>";
					}
				}
				echo "
							</select>
						</td>
					</tr>
					<tr>
                        <th align='right'><label for='ciudad'>Ciudad:</label></th>
                          <td>
                            <select name='ciudad'>";
                            while($row3 = pg_fetch_array($result6)) {
                              $codigo_ciudad = $row3["codigo_ciudad"];
                              $nombre = $row3["nombre_ciudad"];
                              if($ciudad[0]===$codigo_ciudad){
                                echo "<option value=".$codigo_ciudad." selected>".$nombre."</option>";
                              }
                              else{
                                echo "<option value=".$codigo_ciudad.">".$nombre."</option>";
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
                          <a class='btn-a' href='../tablas/empleadosTabla.php'>Cancelar</a>
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
