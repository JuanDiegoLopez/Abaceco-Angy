<?PHP
 $codigo = $_POST['codigo'];
 $cedula = $_POST['cedula'];
 $nombre = $_POST['nombre'];
 $ape1 = $_POST['prim_apellido'];
 $ape2 = $_POST['seg_apellido'];
 $correo = $_POST['correo'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $nacimiento = $_POST['nacimiento'];
 $vinculacion = $_POST['vinculacion'];
 $eps = $_POST['eps'];
 $tienda = $_POST['tienda'];
 $ciudad = $_POST['ciudad'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into empleados (cod_emp, ced_emp, nom_emp, ape1_emp, ape2_emp, corr_emp, direc_emp, tel_emp, fechn_emp, fechv_emp, cod_eps, cod_tnd, cod_ciu) values ('$codigo', '$cedula','$nombre','$ape1','$ape2', '$correo', '$direccion', '$telefono', '$nacimiento', '$vinculacion', '$eps', '$tienda', '$ciudad')";

 $result = pg_query($conexion,$sql);
 if (!$result) {
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/empleadosTabla.php');
  }

?>
