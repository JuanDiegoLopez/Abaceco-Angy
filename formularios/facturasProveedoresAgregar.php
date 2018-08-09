<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/formularios.css">
  <link rel ="stylesheet" href="../css/navbar.css">
  <script src='../js/validacion.js'></script>
  <script type="text/javascript" src='../js/disableselection.js'></script>
  <title>Formulario facturas Proveedores</title>
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
      <h1 align='center'>Facturas Proveedores</h1>
      <form action="../php/facturasProveedores.php" method="post" onsubmit="return validacion()">
       <table align='center' cellspacing=8 >
         <tr>
     		    <th align='right'><label for="tienda">Tienda:</label></th>
     			  <td>
     				<?PHP
     					include('../php/conexion.php');
     					$conexion = conectarse();
     					$query1 = "SELECT * FROM tiendas";
     					$result1 = pg_query($conexion,$query1);
     					if(!$result1){
     						echo "Error en la consulta 1";
     						exit();
     					}
     					$query2 = "SELECT * FROM proveedores";
     					$result2 = pg_query($conexion,$query2);
     					if(!$result2){
     						echo "Error en la consulta 2";
     						exit();
     					}
     				?>
     			  <select name="tienda">
     				<?PHP
     					while($row1 = pg_fetch_array($result1)){
     					$codigo_tienda = $row1["codigo_tienda"];
     					$direccion_tienda = $row1["dr_tnd"];
     					echo "<option value='$codigo_tienda'>$direccion_tienda</option>";
     					}
                   ?>
                 </select>
     			</td>
     		</tr>
      <tr>
         <th align='right'><label for="proveedor">Proveedor:</label></th>
         <td>
           <select name="proveedor">
           <?PHP
             while($row2 = pg_fetch_array($result2)){
             $codigo_proveedor = $row2["codigo_proveedor"];
             $nombre_proveedor = $row2["nom_pro"];
             $apellido1_proveedor = $row2["ape1_pro"];
             $apellido2_proveedor = $row2["ape2_pro"];
             echo "<option value='$codigo_proveedor'>$nombre_proveedor $apellido1_proveedor $apellido2_proveedor</option>";
             }
              ?>
                </select>
         </td>
       </tr>
         <tr>
           <th align='right'><label for="fecha">Fecha:</label></th>
           <td><input type="date" placeholder="" name="fecha"></td>
         </tr>
         <tr>
           <th align='right'><label for="valor">Valor:</label></th>
           <td><input type="text" placeholder="" name="valor" onkeypress='return soloNumeros(event)'></td>
         </tr>

        <tr>
           <td><br></td>
         </tr>
         <tr>
           <td align='right'  colspan='2'>
             <input class ='btn-reset' type="reset" value='Limpiar'>
             <input class='btn' type="submit" value='Enviar'>
			 <a class='btn-a' href='../tablas/facturasProveedoresTabla.php'>Cancelar</a>
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
