<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario articulos</title>
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
      <h1 align='center'>Articulos</h1>
      <form action="../php/articulos.php" onsubmit="return validacion()" method="post">
       <table align='center' cellspacing=8 >

         <tr>
           <th align='right'><label for="descripcion">Descripcion:</label></th>
           <td><input type="text"  name="descripcion"></td>
         </tr>
         <tr>
           <th align='right'><label for="precio">Precio:</label></th>
           <td><input type="text" name="precio" onkeypress="return soloNumeros(event)"></td>
         </tr>
         <tr>
           <th align='right'><label for="categoria">Categoria:</label></th>
           <td>

             <?PHP
               include('../php/conexion.php');
               $conexion = conectarse();
               $query = "SELECT * FROM categorias";
               $result = pg_query($conexion,$query);
               if(!$result){
                 echo "Error en la consulta";
                 exit();
               }
             ?>
             <select name="categoria">
              <?PHP
                 while($row = pg_fetch_array($result)) {
                   $codigo = $row["codigo_categoria"];
                   $nombre = $row["descripcion_categoria"];
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
             <a class='btn-a' href='../tablas/articulosTabla.php'>Cancelar</a>
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
