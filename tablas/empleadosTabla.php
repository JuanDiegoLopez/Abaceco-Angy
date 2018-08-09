<!DOCTYPE html>
<html>
<head>
  <title>Tabla Empleados</title>
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
      $query1 = "select * from empleados";
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
      <form action="empleadosConsultar.php" method="post" onsubmit='return validacion()'>
        <input type="text" class='input' placeholder='Codigo' onkeypress='return soloNumeros(event)' name="codigo"/>
        <input class='btn-b' type="submit" value="Buscar"/>
        <a class='btn-enlace btn-b' href="../formularios/empleadosAgregar.php">Agregar</a>
      </form>
      <br>
      <div class='contenedor2 contenedor-large'>
      <h1 align='center'> Empleados </h1>

      <div class="contenedor3">
        <table align='center' cellspacing=8 class='tabla'>
          <tr class='datos'>
            <td>Codigo</td>
            <td>Cedula</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Correo</td>
            <td>Direccion</td>
            <td>Telefono</td>
            <td>Fecha de nacimiento</td>
            <td>Fecha de vinculación</td>
            <td>EPS</td>
            <td>Tienda</td>
            <td>Ciudad</td>
          </tr>
        <?PHP
        while($array=pg_fetch_array($result1)){
          $query2 = "select * from eps where codigo_eps=$array[10]";
          $result2 = pg_query($conexion,$query2);
          if(!$result2){
            echo "Error en la consulta 2";
            exit();
          }
          $eps = pg_fetch_array($result2);

          $query3 = "select * from tiendas where codigo_tienda=$array[11]";
          $result3 = pg_query($conexion,$query3);
          if(!$result3){
            echo "Error en la consulta 3";
            exit();
          }
          $tienda = pg_fetch_array($result3);

          $query4 = "select * from ciudades where codigo_ciudad=$array[12]";
          $result4 = pg_query($conexion,$query4);
          if(!$result4){
            echo "Error en la consulta 4";
            exit();
          }
          $ciudad = pg_fetch_array($result4);
          echo "
            <tr>
              <td>$array[0]</td>
              <td>$array[1]</td>
              <td>$array[2]</td>
              <td>$array[3] $array[4]</td>
              <td>$array[5]</td>
              <td>$array[6]</td>
              <td>$array[7]</td>
              <td>$array[8]</td>
              <td>$array[9]</td>
              <td>$eps[0]</td>
              <td>$tienda[2]</td>
              <td>$ciudad[1]</td>
            </tr>";
        }
        ?>
           </table>
      </div>

      </div>
    </div>
  </section>
  <footer class="footer">
    <p>Abaceco Angy</p>
  </footer>


  </body>
</html>
