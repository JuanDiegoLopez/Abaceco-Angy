<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE eps SET  nom_eps='$nombre', tel_eps='$telefono', dir_eps='$direccion' where codigo_eps='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/epsTabla.php');
}
?>
