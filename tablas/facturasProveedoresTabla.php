<!DOCTYPE html>
<html>
<head>
  <title>Tabla Facturas Proveedores</title>
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
      $query1 = "select * from facturas_proveedor";
      $result1 = pg_query($conexion,$query1);
      if(!$result1){
        echo "Error en la consulta 1";
        exit();
      }
    ?>
  </header>
  <section class="main">
    <br>
    <br>
    <div class="contenedor1">
      <form action="facturasProveedoresConsultar.php" method="post" onsubmit='return validacion()'>
        <input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo" />
        <input type="submit" class='btn-b' value="Buscar"/>
        <a class='btn-enlace btn-b'href="../formularios/facturasProveedoresAgregar.php">Agregar</a>
      </form>
      <br>
      <div class='contenedor2'>
  		<h1 align='center'> Facturas Proveedores </h1>
  		<table align='center' cellspacing=8 class='tabla'>
  			<tr class='datos'>
  				<td>Codigo</td>
  				<td>Tienda</td>
  				<td>Proveedor</td>
  				<td>Fecha</td>
  				<td>Valor</td>
  			</tr>
      <?PHP
  		while($array=pg_fetch_array($result1)){
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
  					<td>$array[4]</td>
  					<td>$tienda[2]</td>
  					<td>$proveedor[1] $proveedor[2] $proveedor[3]</td>
  					<td>$array[2]</td>
  					<td>$array[3]</td>
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
