<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario Proveedores</title>
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
      <h1 align='center'>Proveedores</h1>
      <form action="../php/proveedores.php"  onsubmit="return validacion()" method="post">
       <table align='center' cellspacing=8 >
         <tr>
           <th align='right'><label for="cedula">Cedula:</label></th>
           <td><input type="text"  name="cedula" onkeypress="return soloNumeros(event)"></td>
         </tr>
         <tr>
           <th align='right'><label for="nombre">Nombre:</label></th>
           <td><input type="text" name="nombre" ></td>
         </tr>
         <tr>
           <th align='right'><label for="prim_apellido">Primer apellido:</label></th>
           <td><input type="text" name="prim_apellido"></td>
         </tr>
         <tr>
           <th align='right'><label for="seg_apellido">Segundo apellido:</label></th>
           <td><input type="text" name="seg_apellido" ></td>
         </tr>
         <tr>
           <th align='right'><label for="correo">Correo:</label></th>
           <td><input type="text" id='correo' name="correo"  onchange="validarEmail(this.value);" onkeydown="validarEmail(this.value);"></td>
           <td><img width="25" id='valido' class='valido'/></td>
         </tr>
         <tr>
           <th align='right'><label for="telefono">Telefono:</label></th>
           <td><input type="text" placeholder="" name="telefono" onkeypress="return soloNumeros(event)"></td>
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
             <a class='btn-a' href='../tablas/proveedoresTabla.php'>Volver</a>
           </td>

         </tr>
       </table>
      </form>

    </fieldset>


    </div>

  </section>
  <footer class="footer">
    <p>Abaceco Angy</p>
  </footer>





</body>
</html>
