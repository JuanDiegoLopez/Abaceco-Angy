<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Abaceco Angy</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <script type="text/javascript" src='../js/disableselection.js'></script>
    <script src="../js/navbar.js"></script>
  </head>
  <body class='body-index'>
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
        <li><a href="qs.php">Quienes somos?</a></li>
        <li><a href="contactar.php"  class="active">Contáctenos</a></li>
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
    <section class="main">
      <h1 class='titulo1'>Contáctanos</h1>
      <p class='texto'>Puedes contactarnos a través de nuestras diferentes redes sociales.</p>
      <table class="tabla-ico">
        <tr>
          <td><a href="#"><img class='icono' src="../recursos/img/facebook.png"></a></td>
          <td><a href="#"><img class='icono' src="../recursos/img/instagram.png" ></a></td>
          <td><a href="#"><img class='icono' src="../recursos/img/twitter.png" ></a></td>
          <td><a href="#"><img class='icono' src="../recursos/img/google.png"></a></td>
        </tr>
        <tr>
          <td><h2>Facebook</h2></td>
          <td><h2>Instagram</h2></td>
          <td><h2>Twitter</h2></td>
          <td><h2>Google+</h2></td>
        </tr>
      </table>
    </section>
    <footer class="footer">
      <p>Abaceco Angy</p>
    </footer>

  </body>
</html>
