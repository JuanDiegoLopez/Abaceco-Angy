<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel ="stylesheet" href="../css/navbar.css">
  <link rel ="stylesheet" href="../css/responsive.css">
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <script src="../js/navbar.js"></script>
  <title>Abaceco Angy</title>
</head>
<body>
  <?PHP
  session_start();
  include('../php/temporizador.php');
  temporizador();
  ?>
    <header>
      <ul class="topnav" id="myTopnav">
        <li><h2 class='titulo-header'>Abaceco Angy</h2></li>
        <li><a href="clientIndex.php" class="active">Inicio</a></li>
        <li><a href="../public/qs.php">Quienes somos?</a></li>
        <li><a href="../public/contactar.php">Contactenos</a></li>
        <li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>
        <li class="icon"><a href="javascript:void(0);" style="font-size:15px;" onclick="navbar()">☰</a></li>
      </ul>
    </header>
    <section class="main" style="padding-bottom:40px; padding-top:0px;">
      <?PHP
      $nombre = $_SESSION['nombre'];
      echo "<h1 class='titulo1'>Bienvenido, $nombre</h1></li>";
      ?>
      <div class="contenedor-iconos" style="padding:50px 20px;">
        <div class="fila">
          <div class="col-large-4 col-medium-4 col-small-6">
            <a href="../tablas/articulosTabla.php"><img class='icono' src="../recursos/img/articulos.png"></a><h2>Articulos</h2>
          </div>
          <div class="col-large-4 col-medium-4 col-small-6">
            <a href="../tablas/serviciostabla.php"><img class='icono' src="../recursos/img/servicios.png"></a><h2>Servicios</h2>
          </div>
          <div class="col-large-4 col-medium-4 col-small-6">
            <a href="../tablas/tiendasTabla.php"><img class='icono' src="../recursos/img/tiendas.png" ></a><h2>Tiendas</h2>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <p>Abaceco Angy</p>
    </footer>


</body>
</html>
