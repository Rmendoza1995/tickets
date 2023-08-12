<html>
<head>
<link rel="stylesheet" href="//bootstrap-extension.com/css/4.5.1/bootstrap-extension.min.css" type="text/css">
<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>

<head>
</html>

<?php
    session_start();
   
include("configuracion.php");
if (mysqli_connect_errno()) {
    echo "Error connecting to database. ".mysqli_connect_error();
}
$asunto=!empty($_POST['asunto']) ? $_POST['asunto'] : NULL;
$detail=!empty($_POST['detail']) ? $_POST['detail'] : NULL;
$fecha_resolucion=!empty($_POST['fecha_resolucion']) ? $_POST['fecha_resolucion'] : NULL;
$estatus=!empty($_POST['estatus']) ? $_POST['estatus'] : NULL;








$sql="INSERT INTO ordenes (asunto, detail,quien_solicita, fecha_resolucion, estatus) 
VALUES  ('$asunto','$detail','".$_SESSION['usuario']."', '$fecha_resolucion', '$estatus')";

$data = mysqli_query($link, $sql);
if($data)
{
  echo'
  <script type="text/javascript">
    alert("Guardado Exitosamente!");
    window.location.href="admin.php";
    </script>';
}else{
  echo 'error';
}





?>


