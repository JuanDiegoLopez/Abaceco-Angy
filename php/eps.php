<?PHP
 $nombre = $_POST['nombre'];
 $direccion = $_POST['direccion'];
 $telefono = $_POST['telefono'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql= "insert into eps values('$nombre','$telefono','$direccion')";

 $result=pg_query($conexion,$sql);
 if (!$result) {
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/epsTabla.php');
  }
?>
