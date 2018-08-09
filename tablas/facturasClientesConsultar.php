<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consultar factura</title>
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
        <form action="facturasClientesConsultar.php" onsubmit="return validacion()" method="post">
          <input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)' name="codigo" />
          <input type="submit" class='btn-b' value="Buscar"/>
          <a class='btn-enlace btn-b'href="../tablas/facturasClientesTabla.php">Todos</a>
        </form>
        <br>

      <?PHP
      include('../php/conexion.php');
      $conexion = conectarse();
      extract($_POST);

      $query1 = "SELECT * from facturas_cliente where codigo_factura=$codigo";
      $result1 = pg_query($conexion,$query1);
      $array= pg_fetch_array($result1);
      $numrows = pg_numrows($result1);
  		if($numrows==0){
        echo "El codigo no existe";
          }
      else{
        echo "
        <div class='contenedor2'>
           <h1 align='center'> Facturas Clientes </h1>
           <table align='center' cellspacing=8 class='tabla'>
             <tr class='datos'>
              <td>Empleado</td>
     					<td>Cliente</td>
     					<td>Fecha</td>
     					<td>Valor</td>
              <td></td>
              <td></td>
            </tr>";

            $query3 = "select * from empleados where cod_emp = $array[0]";
            $result3 = pg_query($conexion,$query3);
            $empleado = pg_fetch_array($result3);

            $query5 = "select * from clientes where codigo_cliente = $array[1]";
            $result5 = pg_query($conexion,$query5);
            $cliente=pg_fetch_array($result5);


          echo "<tr>
                  <td>$empleado[2] $empleado[3] $empleado[4]</td>
                  <td>$cliente[1] $cliente[2] $cliente[3]</td>
                  <td>$array[2]</td>
                  <td>$array[3]</td>
                  <td>
                  <form action='../formularios/facturasClientesModificar.php' method='post'>
                     <input type='hidden' name='codigo' value='$codigo'>
                     <input type='submit' value='Modificar'>
                  </form>
                  </td>
                  <td>
                  <form action='../php/eliminarFacturaCliente.php' method='post'>
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
