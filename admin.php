<?php
date_default_timezone_set('America/Mexico_City');
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
header("Location: logout.php");
die();  
}
$_SESSION['tiempo']=time();

    include_once  ("configuracion.php");





$query22 = "SELECT levely FROM useros WHERE usuario='".$_SESSION['usuario']."' ";

$resultados = mysqli_query($link, $query22);
$rowsis = mysqli_num_rows($resultados);

if ($rowsis == 1) {
    $datos = mysqli_fetch_assoc($resultados);
    if($datos['levely'] == 1) {
echo '<script type="text/javascript">
alert("Debes Iniciar Sesion Como Administrador");
window.location.href="index.php";
</script>';
        exit();
      }}


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

.tab 
{
overflow: hidden;
border: 1px solid #ccc;
background-color: #f1f1f1;
}

.tab button
{
background-color:inherit;
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



<title>ORDENES update</title>

<?php 
$now = date('Y-m-d H:i:s');
$query  = "SELECT * FROM ordenes wHERE estatus='Pendiente'  ORDER BY created_at DESC limit 80" ;
$query2 = "SELECT * FROM ordenes Where estatus='incidencia' ORDER BY created_at DESC limit 80" ;
$query3 = "SELECT * FROM ordenes Where estatus='Resuelto'   ORDER BY created_at DESC limit 80" ;
$query4 = "SELECT * FROM ordenes Where estatus='Caducado'   ORDER BY created_at DESC limit 80" ;
//$query8="UPDATE ordenes SET estatus='Caducado'  WHERE fecha_resolucion <= '$now' AND estatus='Pendiente'";
//$Resultademos = mysqli_query($link, $query8);
?>
<!--inicio tabla-->
<a href="registro.php"   type="button" style="width:320px;" class="btn btn-success">Crear Nueva Orden de Servicio</a>
<form action="search.php" method="POST">
<div class="md-form mt-0">
<input class="form-control" type="text" placeholder="Buscar #Ordenes de servicio" width="30px" name="id" aria-label="Search" required/>
<input type="submit" value="Buscar" class="btn btn-primary">

</div>
</form><a href="logout.php" type="button" style="width:120px;   float: center;" class="btn  btn-info">Cerrar sesión</a>

<script >
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
<div class="tab">
<center> 
<button class="tablinks" onclick="openCity(event, 'Pendientes')">Pendientes</button>
<button class="tablinks" onclick="openCity(event, 'INC')">Incidencia</button>
<button class="tablinks" onclick="openCity(event, 'Resueltas')">Resueltas</button>
<!--button class="tablinks" onclick="openCity(event, 'Caducado')">Caducadas</button-->
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
//la variable $user contiene el contenido de $result en un array asociativo
while($usuario = mysqli_fetch_assoc($result)): 
?>

<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd1.php?id=<?php echo $usuario['id'] ?>"   class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>"    class='btn btn-info'>ver</a> 
<a href="delete.php?id=<?php echo $usuario['id'] ?>" class='btn btn-danger'>Eliminar</a> 
</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>

</div>

</div>

<div id="INC" class="tabcontent">
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
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($result = mysqli_query($link, $query2)):  
?>
<?php 
//la variable $user contiene el contenido de $result en un array asociativo
while($usuario = mysqli_fetch_assoc($result)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd1.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>"  class='btn btn-info'>ver</a> 
<a href="delete.php?id=<?php echo $usuario['id'] ?>" class='btn btn-danger'>Eliminar
</a>

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>
</div>
</DIV>
<div id="Resueltas" class="tabcontent">
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
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($result = mysqli_query($link, $query3)):  
?>
<?php 
//la variable $user contiene el contenido de $result en un array asociativo
while($usuario = mysqli_fetch_assoc($result)): 
?>

<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd1.php?id=<?php echo $usuario['id'] ?>"   class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>"    class='btn btn-info'>ver</a> 
<a href="delete.php?id=<?php echo $usuario['id'] ?>" class='btn btn-danger'>Eliminar</a> 
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
<th>Fecha Creada</th>
<th>Tipo de Urgencia</th>
<th>Estatus</th>


</tr>
</thead>
<tbody>
<?php 
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($resultop = mysqli_query($link, $query4)):  
?>
<?php 
//la variable $user contiene el contenido de $result en un array asociativo
while($usuario = mysqli_fetch_assoc($resultop)): 
?>
<tr>
<td width="20%"><?php echo $usuario['id']; ?></a></td>
<td width="15%"><?php echo $usuario['asunto']; ?></td>
<td width="10%" class="text-center"><?php echo $usuario['created_at']; ?></td>
<td width="15%"><?php echo $usuario['tipo_urgencia']; ?></td>
<td width="15%"><?php echo $usuario['estatus']; ?></td>

<td width="15%" class="text-center">
<a href="upd1.php?id=<?php echo $usuario['id'] ?>"  class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>"    class='btn btn-info'>ver</a> 
<a href="delete.php?id=<?php echo $usuario['id'] ?>" class='btn btn-danger'>Eliminar</a> 
</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($resultop); ?>
<?php endif; ?>
</tbody>		
</table>

</div>

</div>

</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<!-- /.Pie de pagina -->

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>
<script src="assets/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
</body>
</html>
