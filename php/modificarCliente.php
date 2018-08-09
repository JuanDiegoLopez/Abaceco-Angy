<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE clientes SET  nom_cli='$nombre',ape1_cli='$ape1',ape2_cli='$ape2',direc_cli='$dir',tel_cli='$tel',fechn_cli='$fechan', fechv_cli='$fechav', corr_cli='$correo', cod_ciu='$ciudad' where codigo_cliente='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/clientesTabla.php');
}
?>
