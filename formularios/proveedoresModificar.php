<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar proveedor</title>
    <link rel='stylesheet' href='../css/formularios.css'>
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
			<?php
	    include('../php/conexion.php');
	    $conexion = conectarse();
	    extract($_POST);

	    $query1 = "SELECT * from proveedores where codigo_proveedor=$codigo";
	    $result1 = pg_query($conexion,$query1);
	    $array=pg_fetch_array($result1);


	        $query2 = "select * from ciudades";
	        $result2 = pg_query($conexion,$query2);

	        $query3 = "select * from ciudades where codigo_ciudad = $array[6]";
	        $result3 = pg_query($conexion,$query3);
	        $ciudad=pg_fetch_array($result3);


	               echo "

	                 <div class='contenedor'>
	                    <h1 align='center'> Modificar proveedor </h1>
	                    <form action='../php/modificarProveedor.php' onsubmit='return validacion()' method='post'>
	                    <table align='center' cellspacing=8 >
	                      <tr>
	                        <th align='right'><label for='nombre'>Nombre:</label></th>
	                        <td><input type='text' name='nombre' value='$array[1]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='prim_apellido'>Primer apellido:</label></th>
	                        <td><input type='text' name='ape1' value='$array[2]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='seg_apellido'>Segundo apellido:</label></th>
	                        <td><input type='text'name='ape2' value='$array[3]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='correo'>Correo:</label></th>
	                        <td><input type='text' id='correo' name='correo' onchange='validarEmail(this.value);' onkeydown='validarEmail(this.value);' value='$array[4]'/></td>
	                        <td><img width='25' id='valido' class='valido'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='telefono'>Telefono:</label></th>
	                        <td><input type='text' name='tel'  onkeypress='return soloNumeros(event)' value='$array[5]'/></td>
	                      </tr>
	                      <tr>
	                        <th align='right'><label for='ciudad'>Ciudad:</label></th>
	                          <td>
	                            <select name='ciudad'>";

	                            while($row = pg_fetch_array($result2)) {
	                              $codigo_ciudad = $row["codigo_ciudad"];
	                              $nombre = $row["nombre_ciudad"];
	                              if($ciudad[0]===$codigo_ciudad){
	                                echo "<option value=".$ciudad[0]." selected>".$ciudad[1]."</option>";
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
	                          <a class='btn-a' href='../tablas/proveedoresTabla.php'>Cancelar</a>
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
