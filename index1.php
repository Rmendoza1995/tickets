
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
<style>
.w3ls-banner {
background: url(12.jpg) no-repeat;
background-size: cover;
min-height: 100vh;
color: #000000;
background-position:center;
padding-top: 30px;

}
	</style>

<?php 
	//Conecto a mi base de datos
include("configuracion.php");
	
	$sql = "SELECT COUNT(*) total FROM ordenes WHERE estatus='Pendiente'";
	$result = mysqli_query($link, $sql);
	$fila = mysqli_fetch_assoc($result);
	$sqli = "SELECT COUNT(*) totales FROM ordenes WHERE estatus='Resuelto'";
	$resulto = mysqli_query($link, $sqli);
	$filas = mysqli_fetch_assoc($resulto);

	$sqli2 = "SELECT COUNT(*) totale FROM ordenes WHERE estatus='Incidencia'";
	$resultom = mysqli_query($link, $sqli2);
	$filas3 = mysqli_fetch_assoc($resultom);


	$sqli4 = "SELECT COUNT(*) tota FROM ordenes WHERE estatus='Caducado'";
	$resulte= mysqli_query($link, $sqli4);
	$filas4 = mysqli_fetch_assoc($resulte);
?>
</div>
</div>
</div>
</div>
</div>
<div class="w3ls-banner">
<center>
		<script src="assets/js/bootstrap.min.js"></script>

<a href="index2.php" style="font-size:30px; color:coral">
<?php  	echo 'Número total de Ordenes Pendientes: ' . $fila['total'];
?>
</a><br>
<a href="index2.php"  style="font-size:30px; color:white;">
<?php  	echo 'Número total de Ordenes Resueltas: ' . $filas['totales']; ?>
</a><br>

<a href="index2.php"  style="font-size:30px; color:white;">
<?php  	echo 'Número total de Ordenes Incidenecias: ' . $filas3['totale']; ?>
</a>
	<br>	
<a href="index2.php"  style="font-size:30px; color:white;">
<?php  	echo 'Número total de Ordenes Caducadas: ' . $filas4['tota']; ?>
</a>


<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

		

</body>
</html>




