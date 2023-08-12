<?php

include("configuracion.php");
/*$sql_connection = new mysqli('localhost:4437','root','','convenios');*/

if (mysqli_connect_errno()) {
    echo "Error connecting to database. ".mysqli_connect_error();
}
session_start();

$usuario = mysqli_real_escape_string($link, $_POST['usuario']);
$Password = mysqli_real_escape_string($link, $_POST['Password']);

if (!$usuario || !$Password) {
    echo "Both fields must be filled out.";
    return;
}

$query = "SELECT levely from useros WHERE usuario='$usuario' AND clave='$Password'";

$result = mysqli_query($link, $query);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
    // Leer consulta
    $datos = mysqli_fetch_assoc($result);
    // Comparar dato
    if($datos['levely'] == 2) {
        $_SESSION['usuario'] = $usuario;
        header("Location: admin.php");
    }  else if ($datos['levely'] == 0) {

        $consulta="SELECT levely from useros WHERE usuario='".$_SESSION['usuario']."'";
        $resulto = mysqli_query($conexion, $consulta);
        $rowso = mysqli_num_rows($resulto);
        if ($rowso == 0)              
        {
            $_SESSION['usuario'] = $usuario;

            header("Location: registro/contraseña.php");
        }}
    
    
    elseif($datos['levely'] == 3){
      
            $_SESSION['usuario'] = $usuario;
            header("Location: supervisor.php");
        }
    else {
        $_SESSION['usuario'] = $usuario;
        header("Location:index1.php");
    }
    // Finalizar ejecución de script
    exit;
} 

else {
    
    
    echo'<script type="text/javascript">
    alert("intentelo de nuevo O solicita registro");
    window.location.href="index.php";
    </script>';


}