<?PHP
function conectarse()
 {$conn=pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");
  if(!$conn)
   {
    echo "Error conectando a la base de datos.";
    exit();
   }
  if(!$db=pg_dbname())
   {
    echo "Error seleccionando la base de datos.";
    exit();
   }
   return $conn;
 }
 ?>