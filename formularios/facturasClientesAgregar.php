<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Factura cliente</title>
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
    <div class='contenedor'>
      <h1 align='center'>Factura cliente</h1>
      <form action="../php/facturasClientes.php" onsubmit="return validacion()" method="post">
       <table align='center' cellspacing=8 >
         <tr>
           <th align='right'><label for="empleado">Empleado:</label></th>
           <td>
             <?PHP
               include('../php/conexion.php');
               $conexion = conectarse();
               $query = "SELECT * FROM empleados";
               $result = pg_query($conexion,$query);
               if(!$result){
                 echo "Error en la consulta";
                 exit();
               }
             ?>
             <select name="empleado">
              <?PHP
                 while($row = pg_fetch_array($result)) {
                   $codigo = $row["cod_emp"];
                   $nombre = $row["nom_emp"];
                   $ape1 = $row["ape1_emp"];
                   $ape2 = $row["ape2_emp"];
                   echo "<option value=".$codigo.">".$nombre." ".$ape1." ".$ape2."</option>";
                 }
              ?>
             </select>
           </td>
         </tr>
		    <tr>
           <th align='right'><label for="cliente">Cliente:</label></th>
           <td>
             <?PHP
               $query1 = "SELECT * FROM clientes";
               $result1 = pg_query($conexion,$query1);
               if(!$result1){
                 echo "Error en la consulta";
                 exit();
               }
             ?>
             <select name="cliente">
              <?PHP
                 while($row = pg_fetch_array($result1)) {
                   $codigo = $row["codigo_cliente"];
                   $nombre = $row["nom_cli"];
                   $ape1 = $row["ape1_cli"];
                   $ape2 = $row["ape2_cli"];
                   echo "<option value=".$codigo.">".$nombre." ".$ape1." ".$ape2."</option>";

                 }
              ?>
             </select>
           </td>
         </tr>
		       <tr>
           <th align='right'><label for="fecha">Fecha:</label></th>
           <td><input type="date" name="fecha"></td>
         </tr>
         <tr>
           <th align='right'><label for="valor">Valor:</label></th>
           <td><input type="text" name="valor" onkeypress="return soloNumeros(event)"></td>
         </tr>
         <tr>
           <td align='right'  colspan='2'>
             <input class ='btn-reset' type="reset" value='Limpiar'>
             <input class='btn' type="submit" value='Enviar'>
             <a class='btn-a' href='../tablas/facturasClientesTabla.php'>Cancelar</a>
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
