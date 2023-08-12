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
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php 
include("configuracion.php");

if(isset($_GET['id'])){
$id = $_GET['id'];
$query1 = "SELECT * FROM ordenes WHERE id =".$id; 
if($result = mysqli_query($link, $query1)){ 
while($usuario = mysqli_fetch_assoc($result)){ 
$asunto = $usuario['asunto']; 
$detail = $usuario['detail'];
$adicional = $usuario['adicional'];
$que = $usuario['que'];
$firma = $usuario['firma'];
$estatus = $usuario['estatus'];
$que = $usuario['que'];
$updated_at = $usuario['updated_at'];
$created_at = $usuario['created_at'];
$tipo_urgencia = $usuario['tipo_urgencia'];
$adjunto = $usuario['adjunto'];
}
}
}
?>
<script>
function goBack() {
window.history.back();
}
</script>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2 >Ver Requerimiento de trabajo</h2>
</div>
<div class="pull-right">
<button onclick="goBack()"class="btn btn-primary">Atras</button>

</div>
</div>
</div>
<center>

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Asunto:</strong><br>
<?php if(isset($asunto)) echo $asunto; ?>            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Detalles:</strong><br>
<?php if(isset($detail)) echo $detail; ?>            </div>
</div>




<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status :</strong><br>
<?php if(isset($estatus)) echo $estatus; ?>            </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tipo de Urgencia:</strong><br>
<?php if(isset($tipo_urgencia)) echo $tipo_urgencia; ?>            </div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>
Hora Cerrada o Actualizada:</strong><br>
<?php if(isset($updated_at)) echo $updated_at; ?>            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Comentarios :</strong><br>
<?php if(isset($adicional)) echo $adicional; ?>            </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>¿Que se realizo?:</strong><br>
<?php if(isset($que)) echo $que; ?>            </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Firmado por:</strong><br>
<?php if(isset($firma)) echo $firma; ?>            </div>
</div>




<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<br>
<?php
echo '<strong>Ver :</strong><br>';
echo "<a target='_blank'  style='color:#E06300;'href=\"archivos/$adjunto\">$adjunto</a>";

?>  


</div>
</div>





<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Se Creo a las :</strong><br>
<?php if(isset($created_at)) echo $created_at; ?>
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>¿Se cambio a Incidencia?:</strong>
<?php if(isset($inc)) echo $inc; ?>            </div>
</div>



</div>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>


</body>
</html>