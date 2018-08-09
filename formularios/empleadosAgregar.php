<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario empleados</title>
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
    <br/>
    <div class='contenedor'>
      <h1 align='center'>Empleados</h1>
      <form action="../php/empleados.php" method="post" onsubmit="return validacion()">
       <table align='center' cellspacing=8 >
	   <tr>
           <th align='right'><label for="codigo">Codigo:</label></th>
           <td><input type="text" placeholder="" name="codigo" onkeypress="return soloNumeros(event);"></td>
         </tr>
         <tr>
           <th align='right'><label for="cedula">Cedula:</label></th>
           <td><input type="text" placeholder="" name="cedula" onkeypress="return soloNumeros(event);"></td>
         </tr>
         <tr>
           <th align='right'><label for="nombre">Nombre:</label></th>
           <td><input type="text" placeholder="" name="nombre"></td>
         </tr>
         <tr>
           <th align='right'><label for="prim_apellido">Primer apellido:</label></th>
           <td><input type="text" placeholder="" name="prim_apellido"></td>
         </tr>
         <tr>
           <th align='right'><label for="seg_apellido">Segundo apellido:</label></th>
           <td><input type="text" placeholder="" name="seg_apellido"></td>
         </tr>
         <tr>
           <th align='right'><label for="correo">Correo:</label></th>
           <td><input type="text" id='correo' name="correo" onchange="validarEmail(this.value);" onkeydown="validarEmail(this.value);"></td>
		   <td><img width="25" id='valido' class='valido'/></td>
         </tr>
         <tr>
           <th align='right'><label for="direccion">Direccion:</label></th>
           <td><input type="text" placeholder="" name="direccion"/></td>
         </tr>
         <tr>
           <th align='right'><label for="telefono">Telefono:</label></th>
           <td><input type="text" placeholder="" name="telefono"/></td>
         </tr>
         <tr>
           <th align='right'><label for="nacimiento">Fecha de nacimiento:</label></th>
           <td><input type="date" placeholder="" name="nacimiento"/></td>
         </tr>
		 <tr>
           <th align='right'><label for="vinculacion">Fecha de vinculacion:</label></th>
           <td><input type="date" placeholder="" name="vinculacion"/></td>
         </tr>
		<tr>
			<th align='right'><label for="eps">EPS:</label></th>
			<td>
				<?PHP
					include('../php/conexion.php');
					$conexion = conectarse();
					$query1 = "SELECT * FROM eps";
					$result1 = pg_query($conexion,$query1);
					if(!$result1){
						echo "Error en la consulta 1";
						exit();
					}
					$query2 = "SELECT * FROM tiendas";
					$result2 = pg_query($conexion,$query2);
					if(!$result2){
						echo "Error en la consulta 2";
						exit();
					}
					$query3 = "SELECT * FROM ciudades";
					$result3 = pg_query($conexion,$query3);
					if(!$result3){
						echo "Error en la consulta 3";
						exit();
					}
				?>
			<select name="eps">
				<?PHP
					while($row1 = pg_fetch_array($result1)){
					$codigo_eps = $row1["codigo_eps"];
					$nombre_eps = $row1["nom_eps"];
					echo "<option value=".$codigo_eps.">".$nombre_eps."</option>";
					}
              ?>
            </select>
			</td>
		</tr>
		<tr>
			<th align='right'><label for="tienda">Tienda:</label></th>
			<td>
			<select name="tienda">
				<?PHP
					while($row2 = pg_fetch_array($result2)){
					$codigo_tienda = $row2["codigo_tienda"];
					$direccion_tienda = $row2["dr_tnd"];
					echo "<option value=".$codigo_tienda.">".$direccion_tienda."</option>";
					}
				?>
            </select>
			</td>
		</tr>
		<tr>
			<th align='right'><label for="ciudad">Ciudad:</label></th>
			<td>
			<select name="ciudad">
				<?PHP
					while($row3 = pg_fetch_array($result3)){
					$codigo_ciudad = $row3["codigo_ciudad"];
					$nombre_ciudad = $row3["nombre_ciudad"];
					echo "<option value=".$codigo_ciudad.">".$nombre_ciudad."</option>";
					}
				?>
            </select>
			</td>
		</tr>
        <tr>
           <td><br></td>
         </tr>
         <tr>
           <td align='right'  colspan='2'>
             <input class ='btn-reset' type="reset" value='Limpiar'>
             <input class='btn' type="submit" value='Enviar'>
			 <a class='btn-a' href='../tablas/empleadosTabla.php'>Volver</a>
           </td>
        </tr>
       </table>
      </form>
    </div>
  </section>
  <footer class="footer">
    <p>Abaceco Angy</p>
  </footer>


</body>
</html>
