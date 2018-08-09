<?PHP
 $codigo = $_POST['codigo'];
 $descripcion = $_POST['descripcion'];
 $precio = $_POST['precio'];

$conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into servicios (cod_serv, desc_ser, valor_ser) values ('$codigo','$descripcion','$precio')";

 $result = pg_query($conexion,$sql);
 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit;
  }
  else{
    header('Location:../tablas/serviciosTabla.php');
  };
?>
