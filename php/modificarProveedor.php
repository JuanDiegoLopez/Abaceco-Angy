<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE proveedores SET  nom_pro='$nombre',ape1_pro='$ape1',ape2_pro='$ape2',tel_pro='$tel',corr_pro='$correo', cod_ciu='$ciudad' where codigo_proveedor='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/proveedoresTabla.php');
}
?>
