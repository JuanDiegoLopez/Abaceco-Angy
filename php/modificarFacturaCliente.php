<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE facturas_cliente SET  cod_emp='$empleado',cod_cli='$cliente',fech_fac='$fecha',valor_fac='$valor' where codigo_factura='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/facturasClientesTabla.php');
}
?>
