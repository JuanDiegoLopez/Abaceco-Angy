<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <script src="../js/navbar.js"></script>
  <link rel ="stylesheet" href="../css/navbar.css">
  <title>Abaceco Angy</title>
</head>
<body class="body-index">
  <header>
    <ul class="topnav" id="myTopnav">
    <li><h2 class='titulo-header'>Abaceco Angy</h2></li>
    <?PHP
    session_start();
    if ($_SESSION["autentificado"] == 'SI'){
      echo "<li><a href='../users/clientIndex.php'>Inicio</a></li>";
    }
    else {
      echo "<li><a href='../index.html'>Inicio</a></li>";
    }
    ?>
    <li><a href="qs.php"  class="active">Quienes somos?</a></li>
    <li><a href="contactar.php">Contactenos</a></li>
    <li class="icon"><a href="javascript:void(0);" style="font-size:15px;" onclick="navbar()">☰</a></li>
    <?PHP
    if ($_SESSION["autentificado"] == 'SI'){
      include('../php/temporizador.php');
      temporizador();
      echo "<li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>";
    }
    else {
      echo "<li><a href='login.html'>Iniciar sesion</a></li>";
    }
    ?>
  </ul>
  </header>
  <section class='main'>
    <h1 class='titulo1'>¿Quiénes somos?</h1>
    <table class='tablaindex main'>
      <tr class="imagen">
        <td><img src="../recursos/img/mision.png" width="150" align="center"></td>
        <td><img src="../recursos/img/vision.png" width="140" align="center"></td>
      </tr>
      <tr class='info'>
        <td><p>Somos una empresa dedicada a ofrecer la venta de productos y servicios de alta calidad para la limpieza de muebles, tapetes, cortinas, cojineria de carros, entre otros. Buscando un ambiente más sano y confortable para las familias.</p></td>
        <td><p>Ser una empresa reconocida y destacada por excelente desempeño en diferentes ciudades del país , donde se puede constatar el trabajo de lavado de muebles, tapetes, cortinas cojineria de carros entre otras, perteneciendo al gremio de empresa expendedora de productos de limpieza tanto de productos de marcas reconocidos como productos fabricados dentro de esta misma.</p></td>
      </tr>
    </table>
  </section>
  <footer class="footer">
    <p>Abaceco Angy</p>
  </footer>


</body>
</html>
