<?php

session_start();

if (!isset($_SESSION['usuario'])) {
header("Location: index.php");
echo'<script type="text/javascript">
alert("Debes Iniciar Sesion");
window.location.href="index.php";

</script>';

	exit();
}
if (!isset($_SESSION['tiempo'])) {
    $_SESSION['tiempo']=time();
}
else if (time() - $_SESSION['tiempo'] > 1900) {
    session_destroy();
    /* Aquí redireccionas a la url especifica */
	header("Location: index.php");
	
    die();  
}
$_SESSION['tiempo']=time();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div id="wrapper">
		<h3>Eliminar usuario</h3>
		<p>Esta seguro que quiere eliminar este registro permanentemente de la base de datos?</p>
		<form action="deletesuper.php" method="post">
			<input class="btn-danger" type="submit" name="eliminar" value="Eliminar" />
			<input type="hidden" name="sw1" value="1" />
			<?php if(isset($_GET['id'])): ?>
				<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
			<?php endif; ?>
		</form><br />
		<button  class="btn" onclick="goBack()"><< Volver</button>

	</div>



<script>
function goBack() {
  window.history.back();
}
</script>
</body>
</html>
<?php 

//conexion a bbdd
include("configuracion.php");//si el formulario fue enviado
if(isset($_POST['sw1']) == 1){

	//cadena con la consulta de eliminacion segun el id de usuario
	$query = "DELETE FROM ordenes WHERE id =".$_POST['id']; //No olvidar el WHERE en el DELETE!!

	if(mysqli_query($link, $query)){ //si la consulta devuelve un resultado
		header("Location:supervisor.php"); //redirecciono a index.php
	}else{ //si hubo un error
		echo "Ocurrio un error al intentar eliminar el registro"; //mensaje de error
	}
}

//cierro conexion a bbdd
mysqli_close($link);
?>