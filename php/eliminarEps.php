<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
 $sql1= "DELETE FROM eps WHERE codigo_eps='$codigo'";
 $result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/epsTabla.php');
}
?>
