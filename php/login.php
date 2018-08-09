<?PHP
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
 extract($_POST);
include("../php/conexion.php");
$conexion=conectarse();
$sql = "SELECT * FROM usuarios where username='$username' and password='$password'";
$result = pg_query($conexion,$sql);

if(!$result){
  echo"Error en la consulta";
  exit();
}
else{
    $usuario=pg_fetch_array($result);
    if(empty($usuario==true)){
      header("Location: ../public/login.html?errorusuario=si");
    }
    else{
      session_start();
      $_SESSION['autentificado']= 'SI';
      $_SESSION['nombre'] = $usuario['nombre'];
      $_SESSION['tipo'] = $usuario['tipo'];
      $_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

      if($usuario['tipo']=='admin'){
        header('Location: ../users/adminIndex.php');
      }else if($usuario['tipo']=='empleado'){
        header('Location: ../users/emplIndex.php');
      }else{
        header('Location: ../users/clientIndex.php');
      }
    }

}
?>
