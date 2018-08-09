<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario tiendas</title>
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
    <div class='contenedor'>
      <h1 align='center'>Tiendas</h1>
      <form action="../php/tiendas.php" onsubmit="return validacion()" method="post">
       <table align='center' cellspacing=8 >
         <tr>
           <th align='right'><label for="direccion">Direccion:</label></th>
           <td><input type="text" name="direccion" ></td>
         </tr>
         <tr>
           <th align='right'><label for="telefono">Telefono:</label></th>
           <td><input type="text" name="telefono"   onkeypress="return soloNumeros(event)"></td>
         </tr>
         <tr>
           <th align='right'><label for="numero de empleados">Numero de empleados:</label></th>
           <td><input type="text" name="numempleados"  onkeypress="return soloNumeros(event)"></td>
         </tr>
         <tr>
           <th align='right'><label for="ciudad">Ciudad:</label></th>
           <td>

             <?PHP
               include('../php/conexion.php');
               $conexion = conectarse();
               $query = "SELECT * FROM ciudades";
               $result = pg_query($conexion,$query);
               if(!$result){
                 echo "Error en la consulta";
                 exit();
               }
             ?>
             <select name="ciudad">
              <?PHP
                 while($row = pg_fetch_array($result)) {
                   $codigo = $row["codigo_ciudad"];
                   $nombre = $row["nombre_ciudad"];
                   echo "<option value=".$codigo.">".$nombre."</option>";

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
             <a class='btn-a' href='../tablas/tiendasTabla.php'>Cancelar</a>
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
