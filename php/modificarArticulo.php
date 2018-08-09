<?PHP
// Activar errores
	ini_set('display_errors', 'On');
	ini_set('display_errors', 1);

 extract($_POST);
 include("conexion.php");
 $conexion=conectarse();
$sql1= "UPDATE articulos SET  descripcion_articulo='$descripcion', precio_articulo='$precio', codigo_categoria='$categoria' where codigo_articulo='$codigo'";
$result1 = pg_query($conexion,$sql1);
if(!$result1){
  echo "Error en la consulta";
  exit();
}else{
  header('Location: ../tablas/articulosTabla.php');
}
?>
