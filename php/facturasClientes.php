<?PHP
 $codigo = $_POST['codigo'];
 $empleado = $_POST['empleado'];
 $cliente = $_POST['cliente'];
 $fecha = $_POST['fecha'];
 $valor = $_POST['valor'];

  $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into facturas_cliente values ('$empleado','$cliente','$fecha','$valor')";

 $result = pg_query($conexion,$sql);
 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit();
  }
  else{
    header('Location:../tablas/facturasClientesTabla.php');
  }
?>
