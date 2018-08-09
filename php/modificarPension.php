<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE pensiones SET  nom_pen='$nombre', dir_pen='$direccion', tel_pen='$telefono' where codigo_pension='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/pensionesTabla.php');
}
?>
