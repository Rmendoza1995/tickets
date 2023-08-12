<?php
session_start();
if (!isset($_SESSION['usuario'])) {
echo'<script type="text/javascript">
alert("Debes Iniciar Sesion");
window.location.href="index.php";
</script>';

exit();
}if(!isset($_SESSION['tiempo'])) {
$_SESSION['tiempo']=time();
}else if (time() - $_SESSION['tiempo'] > 1900) {
session_destroy();
header("Location: logout.php");
die();  
}
$_SESSION['tiempo']=time();

?>

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
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color:#F7E01E;
}

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

.tab button:hover {
background-color: #28CBCB;
}

.tab button.active {
background-color: #28CBCB;
color:white;

}

.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
}

</style>



<title>Ordenes Omnibus</title>

<body>
<style>
.ambiance-custom {
    background: #000000;
    color: #00FF00;
    padding: 10px;
    margin-right: 100px;
    font-weight: bold;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
</style>

<script>
$.ambiance({message: "Custom styling, you have to define everything!",
    type: "custom",
    timeout: 0
});
</script>

<?php 
include("configuracion.php");
date_default_timezone_set('America/Mexico_City');
$now = date('Y-m-d H:i:s');
$query  = "SELECT * FROM ordenes WHERE estatus='Pendiente'    order by created_at ASC limit 200";
$query2 = "SELECT * FROM ordenes WHERE estatus='Incidencia'  order by created_at DESC limit 200";
$query3 = "SELECT * FROM ordenes WHERE estatus='Resuelto'    order by updated_at DESC limit 200";
$query4 = "SELECT * FROM ordenes WHERE estatus='Caducado'    order by created_at DESC limit 200";


?>
<!--inicio tabla-->
<form action="search.php" method="POST">
<div class="md-form mt-0">
<input class="form-control" type="text" placeholder="Buscar #Ordenes de servicio" width="30px" name="id" aria-label="Search" required/>
<input type="submit" value="Buscar" class="btn btn-primary">

</div>
</form>
<br>
<a href="index1.php" type="button" style="width:320px;" class="btn btn-success">Regresar a vista general</a>
<script>
function openCity(evt, cityName) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.className += " active";
}
</script>
<a href="logout.php" type="button" style="width:120px;  float: right;"class="btn  btn-info">Cerrar sesión</a>
<h2>Selecciona una opcion</h2>

<div class="tab">
<center> 
<button class="tablinks" onclick="openCity(event, 'Pendientes')" >Pendientes</button>
<button class="tablinks" onclick="openCity(event, 'INC')">Incidencias</button>
<button class="tablinks" onclick="openCity(event, 'Resueltas')">Resueltas</button>
<button class="tablinks" onclick="openCity(event, 'Caducado')">Caducadas</button>
</div>
<div id="Pendientes" class="tabcontent">
<div style="overflow-x:auto;">

<table class="table table-striped">
<thead>
<tr>
<th>No. de orden</th>
<th>Asunto</th>
<th>Fecha Creada</th>
<th>Tipo de Urgencia</th>
<th>Estatus</th>


</tr>
</thead>
<tbody>
<?php 
if($result = mysqli_query($link, $query)):  
?>
<?php 
while($usuario = mysqli_fetch_assoc($result)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 
</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>
</div>
</div>

<div style="overflow-x:auto;">

<div id="INC" class="tabcontent">
<table class="table table-striped">
<thead>
<tr>
<th>No. de orden</th>
<th>Asunto</th>
<th>Fecha Creada</th>
<th>Tipo de Urgencia</th>
<th>Estatus</th>


</tr>
</thead>
<tbody>
<?php 
if($result = mysqli_query($link, $query2)):  
?>
<?php 
while($usuario = mysqli_fetch_assoc($result)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?>
</td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">

<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>Ver</a> 
<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 
</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>
</div>
</div>


<div id="Resueltas" class="tabcontent">
<div style="overflow-x:auto;">

<table class="table">
<thead>
<tr>
<th>No. de orden</th>
<th>Asunto</th>
<th>Fecha Creada</th>
<th>Tipo de Urgencia</th>
<th>Estatus</th>
<th>Hora Resuelta</th>


</tr>
</thead>
<tbody>
<?php 
if($result = mysqli_query($link, $query3)):  
?>
<?php 
while($usuario = mysqli_fetch_assoc($result)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>
<td width="15%"><?php echo $usuario['updated_at']; ?></td>

<td width="15%" class="text-center">
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>

</div>
</div>

<div id="Caducado" class="tabcontent">
<div style="overflow-x:auto;">

<table class="table table-striped">
<thead>
<tr>
<th>No. de orden</th>
<th>Asunto</th>
<th>Tipo de Urgencia</th>
<th>Hora estimada de resolucion</th>
<th>Estatus</th>

</tr>
</thead>
<tbody>
<?php 
if($resulte = mysqli_query($link, $query4)): 
?>
<?php 
while($usuario = mysqli_fetch_assoc($resulte)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 
</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($resulte); ?>
<?php endif; ?>
</tbody>		
</table>

</div>
</div>
<!-- PAGE CONTENT ENDS -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<!-- /.Pie de pagina -->
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
<i class="ace-icon fa fa-angle-double-up icon-only bigger-110">
</i>
</a>
</div>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js">

</script>
<script src="assets/js/jquery-ui.custom.min.js">
</script>
<script src="assets/js/jquery.ui.touch-punch.min.js">
</script>
<script src="assets/js/jquery.easypiechart.min.js">
</script>
<script src="assets/js/jquery.sparkline.index.min.js">
</script>
<script src="assets/js/jquery.flot.min.js">
</script>
<script src="assets/js/jquery.flot.pie.min.js">
</script>
<script src="assets/js/jquery.flot.resize.min.js">
</script>
<script src="assets/js/ace-elements.min.js">
</script>
<script src="assets/js/ace.min.js">
</script>
</body>
</html>

