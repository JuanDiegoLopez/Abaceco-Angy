<?PHP

  ini_set('display_errors', 'On');
  ini_set('display_errors', 1);
 $telefono = $_POST['telefono'];
 $numempleados = $_POST['numempleados'];
 $direccion = $_POST['direccion'];
 $ciudad = $_POST['ciudad'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into tiendas values ('$telefono','$numempleados','$direccion','$ciudad')";
 $result = pg_query($conexion,$sql);

 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/tiendasTabla.php');
  }
?>
