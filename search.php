
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
background-color: #27A59C;
color:white;
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
}

.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
}
</style>



<title>ordenes update</title>
<?php 
//Conecto a mi base de datos
include("configuracion.php");
$id = $_POST['id'];//le asigno una variable 

$query  = "SELECT * FROM ordenes WHERE id LIKE '$id%' AND estatus='Pendiente' order by created_at ASC limit 80";
$query3 = "SELECT * FROM ordenes WHERE id LIKE '$id%' AND estatus='inc'       order by created_at ASC limit 80";
$query2 = "SELECT * FROM ordenes WHERE id LIKE '$id%' AND estatus='Caducado'  order by created_at ASC limit 80";
$query4 = "SELECT * FROM ordenes WHERE id LIKE '$id%' AND estatus='Resuelto'  order by created_at ASC limit 80";
//por asunto

$query5 = "SELECT * FROM ordenes WHERE asunto LIKE '$id%' AND estatus='Pendiente'  order by created_at ASC limit 80";
$query6 = "SELECT * FROM ordenes WHERE asunto LIKE '$id%' AND estatus='inc'  order by created_at ASC limit 80";
$query7 = "SELECT * FROM ordenes WHERE asunto LIKE '$id%' AND estatus='Caducado'  order by created_at ASC limit 80";
$query8 = "SELECT * FROM ordenes WHERE asunto LIKE '$id%' AND estatus='Resuelto'  order by created_at ASC limit 80";
?>
<!--inicio tabla-->
<a href="index2.php" type="button" style="width:320px;"class="btn btn-success">Regresar a vista general</a>


<a href="logout.php" type="button" style="width:120px;   float: right;"class="btn  btn-info">Cerrar sesión</a>


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
<h2>Busca por status la orden</h2>
<center> <div class="tab">
<button class="tablinks" onclick="openCity(event, 'Pendientes')" >Pendientes</button>
<button class="tablinks" onclick="openCity(event, 'INC')">Incidencias</button>
<button class="tablinks" onclick="openCity(event, 'Resueltas')">Resueltas</button>
<button class="tablinks" onclick="openCity(event, 'Caducado')">Caducadas</button>
Busqueda de Requerimientos
</div>
<div id="Pendientes" class="tabcontent">
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
<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>


<!---->
<?php 
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($result = mysqli_query($link, $query5)):  
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
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 

<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
<!--agregando query-->
<?php 
if($result = mysqli_query($link, $query6)):  
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
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a>
<a href="upd2.php?id=<?php echo $usuario['id'] ?>" class='btn btn-success'>Editar</a> 

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>
</tbody>		
</table>

</div>




<div id="Resueltas" class="tabcontent">
<table class="table table-striped">
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
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($result = mysqli_query($link, $query4)):  
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
<td width="15%"><?php echo $usuario['updated_at']; ?></td>

<td width="15%" class="text-center">
<a href="ver.php?id=<?php echo $usuario['id'] ?>" class='btn btn-info'>ver</a> 

</td>		
</tr>
<?php endwhile; ?>
<?php mysqli_free_result($result); ?>
<?php endif; ?>


<!--resueltos-->

<?php 
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($result = mysqli_query($link, $query8)):  
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









<div id="Caducado" class="tabcontent">
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
if($resulte = mysqli_query($link, $query2)):  
?>
<?php 
//la variable $user contiene el contenido de $result en un array asociativo
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
<!---caducadas-->
<?php 
//Ejecuto la query para obtener los resultados de la cadena de consulta en la variable $query
if($resulte = mysqli_query($link, $query7)):  
?>
<?php 
//la variable $user contiene el contenido de $result en un array asociativo
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



<!-- PAGE CONTENT ENDS -->
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
