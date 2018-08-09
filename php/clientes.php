<?PHP
 $nombre = $_POST['nombre'];
 $cedula = $_POST['cedula'];
 $ape1 = $_POST['prim_apellido'];
 $ape2 = $_POST['seg_apellido'];
 $correo = $_POST['correo'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];
 $ciudad = $_POST['ciudad'];
 $nacimiento = $_POST['nacimiento'];
 $vinculacion = $_POST['vinculacion'];


 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql= "insert into clientes values('$cedula','$nombre','$ape1','$ape2','$correo','$direccion','$telefono','$nacimiento','$vinculacion','$ciudad')";

 $result=pg_query($conexion,$sql);
 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/clientesTabla.php');
  }
?>
