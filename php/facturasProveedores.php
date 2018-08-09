<?PHP
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
 $tienda = $_POST['tienda'];
 $proveedor = $_POST['proveedor'];
 $fecha = $_POST['fecha'];
 $valor = $_POST['valor'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into facturas_proveedor (cod_tnd, cod_pro, fecha_fp, valor_fp) values ('$tienda', '$proveedor','$fecha','$valor')";

 $result = pg_query($conexion,$sql);
 if (!$result) {
  echo "Ocurrió un error.\n";
  exit();
  }
else{
  header('Location:../tablas/facturasProveedoresTabla.php');
}
?>
