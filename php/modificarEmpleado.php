<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);
 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE empleados SET  ced_emp='$cedula', nom_emp='$nombre', ape1_emp='$ape1',ape2_emp='$ape2', corr_emp='$correo', direc_emp='$direccion', tel_emp='$telefono', fechn_emp='$nacimiento', fechv_emp='$vinculacion', cod_eps='$eps', cod_tnd='$tienda', cod_ciu='$ciudad' where cod_emp='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/empleadosTabla.php');
}
?>
