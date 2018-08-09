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

  <header>
    <ul class="topnav" id="myTopnav">
      <?PHP
      session_start();
      include('../php/temporizador.php');
      temporizador();
      ?>
      <li><h2 class='titulo-header'>Administrador</h2></li>
      <li><a href='../users/adminIndex.php' class='active'>Inicio</a></li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Tablas</a>
            <div class='dropdown-content'>
              <a href='../tablas/articulostabla.php'>Articulos</a>
              <a href='../tablas/serviciostabla.php'>Servicios</a>
              <a href='../tablas/clientestabla.php'>Clientes</a>
              <a href='../tablas/proveedorestabla.php'>Proveedores</a>
              <a href='../tablas/tiendastabla.php'>Tiendas</a>
              <a href='../tablas/Epstabla.php'>Eps</a>
              <a href='../tablas/empleadostabla.php'>Empleados</a>
              <a href='../tablas/pensionestabla.php'>Pensiones</a>
            </div>
          </div>
      </li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Facturas</a>
            <div class='dropdown-content'>
              <a href='../tablas/facturasclientestabla.php'>Clientes</a>
              <a href='../tablas/facturasproveedorestabla.php'>Proveedores</a>
            </div>
          </div>
      </li>
      <li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>
      <li class="icon"><a href="javascript:void(0);" style="font-size:15px;" onclick="navbar()">☰</a></li>
    </ul>

  </header>
  <section class="main">
    <div class="contenedor-iconos">
      <div class="fila">
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/empleadostabla.php"><img class='icono' src="../recursos/img/empleados.png"></a>
          <h2>Empleados</h2>
        </div>
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/clientestabla.php"><img class='icono' src="../recursos/img/clientes.png" ></a>
          <h2>Clientes</h2>
        </div>
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/tiendasTabla.php"><img class='icono' src="../recursos/img/tiendas.png" ></a>
          <h2>Tiendas</h2>
        </div>
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/serviciostabla.php"><img class='icono' src="../recursos/img/servicios.png"></a>
          <h2>Servicios</h2>
        </div>
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/articulosTabla.php"><img class='icono' src="../recursos/img/articulos.png"></a>
          <h2>Articulos</h2>
        </div>
        <div class="col-large-2 col-medium-4 col-small-6">
          <a href="../tablas/proveedorestabla.php"><img class='icono' src="../recursos/img/proveedores.png"></a>
          <h2>Proveedores</h2>
        </div>
      </div>
      <div class="fila">
        <div class="col-large-3 col-medium-4 col-small-6">
          <a href="../tablas/epstabla.php"><img class='icono' src="../recursos/img/eps.png"></a><h2>Eps</h2>
        </div>
        <div class="col-large-3 col-medium-4 col-small-6">
          <a href="../tablas/pensionestabla.php"><img class='icono' src="../recursos/img/pensiones.png"></a><h2>Pensiones</h2>
        </div>
        <div class="col-large-3 col-medium-4 col-small-6">
          <a href="../tablas/facturasclientestabla.php"><img class='icono' src="../recursos/img/fclientes.png"></a><h2>Facturas clientes</h2>
        </div>
        <div class="col-large-3 col-medium-4 col-small-6">
          <a href="../tablas/facturasproveedorestabla.php"><img class='icono' src="../recursos/img/fproveedores.png" ></a><h2>Facturas proveedores</h2>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <p>Abaceco Angy</p>
  </footer>
</body>
</html>
