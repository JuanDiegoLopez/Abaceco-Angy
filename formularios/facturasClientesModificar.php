<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modificar factura cliente</title>
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
		<section class="main">
			<?php
    include('../php/conexion.php');
    $conexion = conectarse();
    extract($_POST);

    $query1 = "SELECT * from facturas_cliente where codigo_factura=$codigo";
    $result1 = pg_query($conexion,$query1);
    $array=pg_fetch_array($result1);


        $query2 = "select * from empleados";
        $result2 = pg_query($conexion,$query2);

        $query3 = "select * from empleados where cod_emp = $array[0]";
        $result3 = pg_query($conexion,$query3);
        $empleado = pg_fetch_array($result3);

        $query4 = "select * from clientes";
        $result4 = pg_query($conexion,$query4);

        $query5 = "select * from clientes where codigo_cliente = $array[1]";
        $result5 = pg_query($conexion,$query5);
        $cliente = pg_fetch_array($result5);

               echo "
                 <div class='contenedor'>
                    <h1 align='center'> Modificar factura</h1>
                    <form action='../php/modificarFacturaCliente.php' onsubmit='return validacion()' method='post'>
                    <table align='center' cellspacing=8 >
                      <tr>
                        <th align='right'><label for='ciudad'>Empleado:</label></th>
                          <td>
                            <select name='empleado'>";

                            while($row = pg_fetch_array($result2)) {
                              $cod_emp = $row["cod_emp"];
                              $nombre = $row["nom_emp"];
                              $ape1 = $row["ape1_emp"];
                              $ape2 = $row["ape2_emp"];
                              if($empleado[0]===$cod_emp){
                                echo "<option value=".$empleado[0]." selected>".$empleado[2]." ".$empleado[3]." ".$empleado[4]."</option>";
                              }
                              else{
                                echo "<option value=".$cod_emp.">".$nombre." ".$ape1." ".$ape2."</option>";
                              }
                            }

                    echo " </select>
                        </td>
                      </tr>
                      <tr>
                        <th align='right'><label for='cliente'>Cliente:</label></th>
                        <td>
                          <select name='cliente'>";
                          while($row = pg_fetch_array($result4)) {
                            $cod_cli = $row["codigo_cliente"];
                            $nombre = $row["nom_cli"];
                            $ape1 = $row["ape1_cli"];
                            $ape2 = $row["ape2_cli"];
                            if($cliente[10]===$cod_cli){
                              echo "<option value=".$cliente[10]." selected>".$cliente[1]." ".$cliente[2]." ".$cliente[3]."</option>";
                            }
                            else{
                              echo "<option value=".$cod_cli.">".$nombre." ".$ape1." ".$ape2."</option>";
                            }
                          }
                    echo" </select>

                        </td>
                      </tr>
                      <tr>
                        <th align='right'><label for='fecha'>Fecha:</label></th>
                        <td><input type='date' name='fecha' value='$array[2]'/></td>
                      </tr>
                      <tr>
                        <th align='right'><label for='valor'>Valor:</label></th>
                        <td><input type='text' onkeypress='return soloNumeros(event)' name='valor' value='$array[3]'/></td>
                      </tr>
                      <tr>
                        <td align='right'  colspan='2'>
                          <input type='hidden' name='codigo' value='$codigo'/>
                          <input class='btn' type='submit' value='Guardar'/>
                          <a class='btn-a' href='../tablas/facturasClientesTabla.php'>Volver</a>
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
