<?PHP
 $nombre = $_POST['nombre'];
 $cedula = $_POST['cedula'];
 $ape1 = $_POST['prim_apellido'];
 $ape2 = $_POST['seg_apellido'];
 $correo = $_POST['correo'];
 $telefono = $_POST['telefono'];
 $ciudad = $_POST['ciudad'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql= "insert into proveedores values('$cedula','$nombre','$ape1','$ape2','$correo','$telefono','$ciudad')";

 $result=pg_query($conexion,$sql);
 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/proveedoresTabla.php');
  }
?>
