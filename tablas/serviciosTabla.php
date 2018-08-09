<!DOCTYPE html>
<html>
<head>
  <title>Tabla Servicios</title>
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
      include('../php/conexion.php');
      $conexion = conectarse();
      $query1 = "select * from servicios";
      $result1 = pg_query($conexion,$query1);
      if(!$result1){
        echo "Error en la consulta 1";
        exit();
      }
    ?>
  </header>
  <section class="main">
    <br>
    <div class="contenedor1">
      <?PHP
			session_start();
			if(($_SESSION['tipo']=='admin') or ($_SESSION['tipo']=='empleado')){
				echo "
				<form action='serviciosConsultar.php' onsubmit='return validacion()' method='post'>
					<input  placeholder='Codigo' type='text' onkeypress='return soloNumeros(event)' class='input' name='codigo'/>
					<input  class='btn-b' type='submit' value='Buscar'/>
					<a class='btn-enlace btn-b' href='../formularios/serviciosAgregar.php'>Agregar</a>
				</form>
				<br>";
			}
				?>
       <br/>
      <div class='contenedor2'>
  		<h1 align='center'> Servicios </h1>
  		<table align='center' cellspacing=8 class='tabla'>
  			<tr class='datos'>
  				<td>Codigo</td>
  				<td>Descripción</td>
  				<td>Precio</td>
  			</tr>
      <?PHP
  		while($array=pg_fetch_array($result1)){
  			echo "
  				<tr>
  					<td>$array[0]</td>
  					<td>$array[1]</td>
  					<td>$array[2]</td>
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
