
<?php
date_default_timezone_set('America/Mexico_City');

session_start();

if (!isset($_SESSION['usuario'])) {
echo'<script type="text/javascript">
alert("Debes iniciar sesion");
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
<html lang="es">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
.footer {
position: fixed;
left: 0;
bottom: 0;
width: 100%;
text-align: center;
}
/* Style the tab */
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color: #f1f1f1;
}
.tabita {
overflow: hidden;
color: white;
font-size:30px;
background-color:#740DB6;
border-radius:20px;
width:700px;

}

@media (max-width: 600px) {
.tabita {
font-size:25px;
width:100%;

}
}

.footer {
position: fixed;
left: 0;
bottom: 0;
width: 100%;
background-color: transparent;
color: white;
text-align: center;
}
/* Style the buttons inside the tab */
.tab button {
background-color: inherit;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #28CBCB;
}

/* Create an active/current tablink class */
.tab button.active {
background-color: #28CBCB;
}

/* Style the tab content */
.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
}


.w3ls-banner {
background: rgb(29,2,94);
background: -moz-radial-gradient(circle, rgba(29,2,94,1) 0%, rgba(112,24,236,1) 83%);
background: -webkit-radial-gradient(circle, rgba(29,2,94,1) 0%, rgba(112,24,236,1) 83%);
background: radial-gradient(circle, rgba(29,2,94,1) 0%, rgba(112,24,236,1) 83%);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#1d025e",endColorstr="#7018ec",GradientType=1);
background-size: cover;
min-height: 100vh;
color: white;
background-position:center;
padding-top: 30px;	
}



.blockquote {

padding: 3px 10px;

width: 400px;

border: white 5px double;

background-color: #021924;

opacity: 0.8;

border-top-left-radius: 20px;

border-bottom-right-radius: 20px;

}

</style>

<div class="w3ls-banner">
<center>
<a href="logout.php"   type="button" style="width:90%; height:35px; font-size:18px;" class="btn  btn-info">Cerrar sesión</a><br><br>
<a href="soporte.html" type="button" style="width:90%; height:35px; font-size:18px;" class="btn btn-info">Contactar a Soporte</a>
</center>
<a href="registrosuper.php" type="button" style="width:10%; height:35px; font-size:18px; border-radius:20px; position: relative;
top: 50px; left: 10px;"class="btn btn-success">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a><br>

<title>ordenes Omnibus</title>

<?php 
//Conecto a mi base de datos
include("configuracion.php");

$query = "SELECT * FROM ordenes WHERE quien_solicita='".$_SESSION['usuario']."' ORDER BY created_at DESC limit 100";
?>
<!--inicio tabla-->
<?php 
$hora = date('G'); if (($hora >= 0) AND ($hora < 6)) 
{ 
$mensaje = "Buena madrugada"; 
} 
else if (($hora >= 6) AND ($hora < 12)) 
{ 
$mensaje = "Buenos dias"; 
} 
else if (($hora >= 12) AND ($hora < 18)) 
{ 
$mensaje = "Buenas tardes"; 
} 
else
{ 
$mensaje = "Buenas noches"; 
} 
?>

<?php
echo "<center><h4 class='tabita'>". "Bienvenid@: " . $_SESSION['usuario'] ."&nbsp; " .$mensaje. "</h4></center>" . "\n\n";

?></h1>

</center>
<br>
<?php 

if($result = mysqli_query($link, $query)):  

?>

<?php 

while($usuario = mysqli_fetch_assoc($result)): 

?>

<center>

<div class="blockquote">



<a href="ver.php?id=<?php echo $usuario['id'] ?>" style="   text-decoration:none;
color:white; font-size:15px">



No. de orden: <?php echo $usuario['id']; ?></td>

<br> 	Asunto: <?php echo $usuario['asunto']; ?></td>

<br>  Fecha Creada: <?php echo $usuario['created_at']; ?></td>

<br> 	Tipo de Urgencia: <?php echo $usuario['tipo_urgencia']; ?></td>

<br> 	Estatus: <?php echo $usuario['estatus']; ?></td>



<!--a href="upd1.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a--> 

</a> <br>

<a href="deletesuper.php?id=<?php echo $usuario['id'] ?>" class='btn btn-danger'>Eliminar</a> 

</div>

</center>



<?php endwhile; ?>

<?php mysqli_free_result($result); ?>

<?php endif; ?>




<div class="footer">



<marquee behavior="alternate" direction="up" width="100%"><marquee direction="right"><img src="logo.png"  width="25%"></marquee></marquee>
</div>



</body>
</html>
