<?php
function temporizador(){

  session_start();
  date_default_timezone_set('America/Bogota');

  if ($_SESSION["autentificado"] == 'SI') {

    $fechaGuardada = $_SESSION["ultimoAcceso"];
    $ahora = date("Y-n-j H:i:s");
    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
    if($tiempo_transcurrido >= 600) {
      session_destroy();
      header("Location: ../public/login.html");
    }else {
    $_SESSION["ultimoAcceso"] = $ahora;
    }

  }else{
  header('Location: ../public/login.html');
  }
}
?>
