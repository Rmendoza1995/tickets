<?php

if(isset($_POST['enviar'])) {
include ("configuracion.php");
$conexion = new mysqli ($server,$user,$pass,$bd);
if (!$conexion) {
$msg="Conexión imposible. Revise las credenciales de conexión";  
} else {
$usuario=!empty($_POST['usuario']) ? $_POST['usuario'] : NULL;
$Password=!empty($_POST['Password']) ? $_POST['Password'] : NULL;
$correoe=!empty($_POST['correoe']) ? $_POST['correoe'] : NULL;

$repassword=!empty($_POST['repassword']) ? $_POST['repassword'] : NULL;
$levely=!empty($_POST['levely']) ? $_POST['levely'] : NULL;
$nombre=!empty($_POST['nombre']) ? $_POST['nombre'] : NULL;
if($usuario && $Password && $repassword && $nombre)
 { 
$sql = 'SELECT * FROM useros';
 
$rec = $conexion->query($sql); 

$verificar_usuario = FALSE;

while($result = $rec->fetch_object()) { 
if($result->usuario == $usuario) { 
$verificar_usuario = TRUE; 

break; 
}
} 

if(!$verificar_usuario) { 

if($Password == $repassword) { 
    

$sql = "INSERT INTO useros (nombre,correoe,usuario, clave,fecha_registro,levely)
VALUES ('$nombre', '$correoe','$usuario', '$Password', NOW(), $levely);";

if ($conexion->query($sql) && $conexion->affected_rows > 0) {
echo '<script type="text/javascript">
alert("Usted se ha registrado correctamente.");
window.location.href="index.php";
</script>';


} else {
$msg="Error en la inserción";
}
} else { 
$msg="Las claves no son iguales, intente nuevamente."; 
} 
} else {

$msg="Este usuario ya ha sido registrado anteriormente."; 
} 

} else {
$msg="Por favor llene todos los campos. Faltan datos en el POST";
}
}

} else {
$msg="";  
}

echo $msg;

?>

