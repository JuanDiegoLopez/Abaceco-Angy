<?php
  function navbar(){
  session_start();
  if($_SESSION['tipo']=='admin'){
    echo"
    <script src='../js/navbar.js'></script>
    <ul class='topnav' id='myTopnav'>
      <li><h2 class='titulo-header'>Administrador</h2></li>
      <li><a href='../users/adminIndex.php'>Inicio</a></li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Tablas</a>
            <div class='dropdown-content'>
              <a href='../tablas/articulosTabla.php'>Articulos</a>
              <a href='../tablas/clientesTabla.php'>Clientes</a>
              <a href='../tablas/proveedoresTabla.php'>Proveedores</a>
              <a href='../tablas/tiendasTabla.php'>Tiendas</a>
              <a href='../tablas/epsTabla.php'>Eps</a>
              <a href='../tablas/empleadosTabla.php'>Empleados</a>
              <a href='../tablas/pensionesTabla.php'>Pensiones</a>
            </div>
          </div>
      </li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Facturas</a>
            <div class='dropdown-content'>
              <a href='../tablas/facturasClientesTabla.php'>Clientes</a>
              <a href='../tablas/facturasProveedoresTabla.php'>Proveedores</a>
            </div>
          </div>
      </li>
      <li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>
      <li class='icon'><a href='javascript:void(0);' style='font-size:15px;' onclick='navbar()'>☰</a></li>
    </ul>
    ";
  }elseif ($_SESSION['tipo']=='empleado') {
    echo "
    <script src='../js/navbar.js'></script>
    <ul class='topnav' id='myTopnav'>
      <li><h2 class='titulo-header'>Empleado</h2></li>
      <li><a href='../users/emplIndex.php'>Inicio</a></li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Tablas</a>
            <div class='dropdown-content'>
              <a href='../tablas/articulosTabla.php'>Articulos</a>
              <a href='../tablas/clientesTabla.php'>Clientes</a>
              <a href='../tablas/proveedoresTabla.php'>Proveedores</a>
              <a href='../tablas/tiendasTabla.php'>Tiendas</a>
            </div>
          </div>
      </li>
      <li><div class='dropdown'>
            <a href='javascript:void(0)' class='dropbtn'>Facturas</a>
            <div class='dropdown-content'>
              <a href='../tablas/facturasClientesTabla.php'>Clientes</a>
              <a href='../tablas/facturasProveedoresTabla.php'>Proveedores</a>
            </div>
          </div>
      </li>
      <li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>
      <li class='icon'><a href='javascript:void(0);' style='font-size:15px;' onclick='navbar()'>☰</a></li>
    </ul>";
  }else {
    echo "
    <script src='../js/navbar.js'></script>
      <ul class='topnav' id='myTopnav'>
        <li><h2 class='titulo-header'>Abaceco Angy</h2></li>
        <li><a href='../users/clientIndex.php'>Inicio</a></li>
        <li><a href='../public/qs.php'>Quienes somos?</a></li>
        <li><a href='../public/contactar.php'>Contactenos</a></li>
        <li><a class='cerrar-sesion' href='../php/cerrarsesion.php'>Cerrar sesion</a></li>
        <li class='icon'><a href='javascript:void(0);' style='font-size:15px;' onclick='navbar()'>☰</a></li>

      </ul>";

  }
}
 ?>
