<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consultar cliente</title>
    <link rel="stylesheet" href="../css/tablas.css">
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
      <br>
      <div class="contenedor1">
        <form action="clientesConsultar.php"  onsubmit="return validacion()" method="post">
          <input class='input' placeholder="Codigo" type="text" onkeypress='return soloNumeros(event)' name="codigo" />
          <input class='btn-b' type="submit" value="Buscar"/>
          <a class='btn-enlace btn-b'href="../tablas/clientestabla.php">Todos</a>
        </form>
        <br>

      <?PHP
      include('../php/conexion.php');
      $conexion = conectarse();
      extract($_POST);

      $query1 = "SELECT * from clientes where codigo_cliente=$codigo";
      $result1 = pg_query($conexion,$query1);
      $numrows = pg_numrows($result1);
  		if($numrows==0){
        echo "El codigo no existe";
          }
      else{
        echo "
        <div class='contenedor2 contenedor-large'>
           <h1 align='center'> Clientes </h1>
           <div class='contenedor3'>
           <table align='center' cellspacing=8 class='tabla'>
             <tr class='datos'>
              <td>Cedula</td>
              <td>Nombre</td>
              <td>Apellidos</td>
              <td>Correo</td>
              <td>Direccion</td>
              <td>Telefono</td>
              <td>Fecha Nacimiento</td>
              <td>Fecha vinculacion</td>
              <td>Ciudad</td>
              <td></td>
              <td></td>
            </tr>";
          $array=pg_fetch_array($result1);
          $query2 = "select * from ciudades where codigo_ciudad = $array[9]";
          $result2 = pg_query($conexion,$query2);
          if(!$result2){
            echo "Error en la consulta 2";
            exit();
          }
          $ciudad = pg_fetch_array($result2);

          echo "<tr>
                  <td>$array[0]</td>
                  <td>$array[1]</td>
                  <td>$array[2] $array[3]</td>
                  <td>$array[4]</td>
                  <td>$array[5]</td>
                  <td>$array[6]</td>
                  <td>$array[7]</td>
                  <td>$array[8]</td>
                  <td>$ciudad[1]</td>
                  <td>
                  <form action='../formularios/clientesModificar.php' method='post'>
                     <input type='hidden' name='codigo' value='$codigo'>
                     <input type='submit' value='Modificar'>
                  </form>
                  </td>
                  <td>
                  <form action='../php/eliminarCliente.php' method='post'>
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
    </div>

    </section>
    <footer class="footer">
      <p>Abaceco Angy</p>
    </footer>
  </body>

</html>
