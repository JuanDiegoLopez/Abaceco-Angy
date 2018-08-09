<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario Eps</title>
</head>
<body>
  <header>
    <?php
      include('../php/navbar.php');
      navbar();
      include('../php/temporizador.php');
      temporizador();
     ?>
  </header>
  <section class="main">
    <br/>
    <br/>
    <br/>
    <div class='contenedor'>
      <h1 align='center'>EPS</h1>
      <form action="../php/eps.php" method="post" onsubmit="return validacion()">
       <table align='center' cellspacing=8 >
         <tr>
           <th align='right'><label for="nombre">Nombre:</label></th>
           <td><input type="text" placeholder="" name="nombre"></td>
         </tr>
         <tr>
           <th align='right'><label for="telefono">Telefono:</label></th>
           <td><input type="text" placeholder="" name="telefono"/></td>
         </tr>
		 <tr>
           <th align='right'><label for="direccion">Direccion:</label></th>
           <td><input type="text" placeholder="" name="direccion"/></td>
         </tr>
        <tr>
           <td><br></td>
         </tr>
         <tr>
           <td align='right'  colspan='2'>
             <input class ='btn-reset' type="reset" value='Limpiar'>
             <input class='btn' type="submit" value='Enviar'>
			 <a class='btn-a' href='../tablas/epsTabla.php'>Volver</a>
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
