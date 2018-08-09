<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consultar articulos</title>
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
    <section class="main">
      <br>
      <br>
      <div class="contenedor1">
        <form action="articulosConsultar.php" onsubmit="return validacion()" method="post">
          <input type="text" class="input" placeholder="Codigo" onkeypress='return soloNumeros(event)'name="codigo" />
          <input class='btn-b' type="submit" value="Buscar"/>
          <a class='btn-enlace btn-b' href="../tablas/articulosTabla.php">Todos</a>
        </form>
        <br>

      <?PHP
      include('../php/conexion.php');
      $conexion = conectarse();
      extract($_POST);

      $query1 = "SELECT * from articulos where codigo_articulo=$codigo";
      $result1 = pg_query($conexion,$query1);
      $numrows = pg_numrows($result1);
      if($numrows==0){
        echo "El codigo no existe";
          }
      else{
        echo "
        <div class='contenedor2'>
          <h1 align='center'>Articulos</h1>
          <table align='left' class='tabla'>
            <tr class='datos'>
              <td>Codigo</td>
              <td>Descripcion</td>
              <td>Precio</td>
              <td>Categoria</td>
              <td></td>
              <td></td>
            </tr>";

          $vec=pg_fetch_array($result1);
          $sql2 = "select * from categorias where codigo_categoria = $vec[2]";
          $result2 = pg_query($conexion,$sql2);
          if(!$result2){
            echo "Error en la consulta 2";
            exit();
          }
          $categoria = pg_fetch_array($result2);
          echo "<tr>
              <td>$vec[3]</td>
              <td>$vec[0]</td>
              <td>$$vec[1]</td>
              <td>$categoria[1]</td>
                  <td>
                  <form action='../formularios/articulosModificar.php' method='post'>
                     <input type='hidden' name='codigo' value='$codigo'>
                     <input type='submit' value='Modificar'>
                  </form>
                  </td>
                  <td>
                  <form action='../php/eliminarArticulo.php' method='post'>
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
