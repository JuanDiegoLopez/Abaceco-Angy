<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consultar tiendas</title>
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel ="stylesheet" href="../css/navbar.css">
    <script src='../js/validacion.js'></script>
    <script type="text/javascript" src='../js/disableselection.js'></script>
  <body>
    <header>
      <?php
  			include('../php/navbar.php');
  			navbar();
        include('../php/temporizador.php');
        temporizador();
  		 ?>
    </header>
    <section class='main'>
      <br>
      <div class="contenedor1">
        <form action="tiendasConsultar.php" onsubmit='return validacion()' method="post">
          <input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo" />
          <input type="submit" class='btn-b' value="Buscar"/>
          <a class='btn-enlace btn-b' href="../tablas/tiendasTabla.php">Todos</a>
        </form>
        <br>

      <?PHP
      include('../php/conexion.php');
      $conexion = conectarse();
      extract($_POST);

      $query1 = "SELECT * from tiendas where codigo_tienda=$codigo";
      $result1 = pg_query($conexion,$query1);
      $numrows = pg_numrows($result1);
  		if($numrows==0){
        echo "El codigo no existe";
          }
      else{
        echo "
        <div class='contenedor2'>
    			<h1 align='center'>Tiendas</h1>
    			<table align='left' class='tabla'>
    				<tr class='datos'>
              <td>Telefono</td>
              <td>Numero de empleados</td>
              <td>Direccion</td>
              <td>Ciudad</td>
              <td></td>
              <td></td>
    				</tr>";

          $vec=pg_fetch_array($result1);
          $sql2 = "select * from ciudades where codigo_ciudad = $vec[3]";
          $result2 = pg_query($conexion,$sql2);
          if(!$result2){
            echo "Error en la consulta 2";
            exit();
          }
          $ciudad = pg_fetch_array($result2);
          echo "<tr>
                  <td>$vec[0]</td>
                  <td>$vec[1]</td>
                  <td>$vec[2]</td>
                  <td>$ciudad[1]</td>
                  <td>
                  <form action='../formularios/tiendasModificar.php' method='post'>
                     <input type='hidden' name='codigo' value='$codigo'>
                     <input type='submit' value='Modificar'>
                  </form>
                  </td>
                  <td>
                  <form action='../php/eliminarTienda.php' method='post'>
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
    <footer class='footer'>
      <p>Abaceco Angy</p>
    </footer>


  </body>
</html>
