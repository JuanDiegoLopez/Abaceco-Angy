<!DOCTYPE html>
<html>
<head>
  <title>Tabla Proveedores</title>
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
        include('../php/conexion.php');
        $conexion = conectarse();

        $query1 = "select * from proveedores";
        $result1 = pg_query($conexion,$query1);
        if(!$result1){
          echo "Error en la consulta 1";
          exit();
        }
      ?>
    </header>
    <section class="main">
      <br>
      <div class="contenedor1">
      <?PHP
      session_start();
      if($_SESSION['tipo']=='admin'){
        echo "
        <form action='proveedoresConsultar.php' onsubmit='return validacion()' method='post'>
          <input  placeholder='Codigo' type='text' onkeypress='return soloNumeros(event)' class='input' name='codigo'/>
          <input  class='btn-b' type='submit' value='Buscar'/>
          <a class='btn-enlace btn-b' href='../formularios/proveedoresAgregar.php'>Agregar</a>
        </form>
        <br>";
      }
        ?>
        <div class='contenedor2 contenedor-large' style='width:59% !important;'>
           <h1 align='center'> Proveedores </h1>
           <div class="contenedor3">
             <table align='center' cellspacing=8 class='tabla'>
               <tr class='datos'>
                 <td>Codigo</td>
                 <td>Cedula</td>
                 <td>Nombres</td>
                 <td>Apellidos</td>
                 <td>Correo</td>
                 <td>Telefono</td>
                 <td>Ciudad</td>
               </tr>

            <?PHP
             while($array=pg_fetch_array($result1)){

               $query2 = "select * from ciudades where codigo_ciudad = $array[6]";
               $result2 = pg_query($conexion,$query2);
               if(!$result2){
                 echo "Error en la consulta 2";
                 exit();
               }
               $ciudad = pg_fetch_array($result2);
               echo "<tr>
                      <td>$array[7]</td>
                       <td>$array[0]</td>
                       <td>$array[1]</td>
                       <td>$array[2] $array[3]</td>
                       <td>$array[4]</td>
                       <td>$array[5]</td>
                       <td>$ciudad[1]</td>
                      </tr>";
             }
            ?>
             </table>

           </div>

        </div>
      </div>

    </section>
    <footer class="footer">
      <p>Abaceco Angy</p>
    </footer>



  </body>
</html>
