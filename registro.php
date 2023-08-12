<?php
date_default_timezone_set('America/Mexico_City');

session_start();

if (!isset($_SESSION['usuario'])) {
header("Location: index.php");
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
/* Aquí redireccionas a la url especifica */
header("Location: logout.php");
die();  
}
$_SESSION['tiempo']=time();
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<center><h2 >Añadir Nuevo Requerimiento </h2> <h2 style="font-size:18px; color:blue;" >Toma en cuenta notificar por correo o telefono acerca de tu orden.</h2>
</div></center>
<div class="pull-right">
<a class="btn btn-primary" href="admin.php"> Atras</a>
</div>
</div>
</div>


<form action="regissuper.php" method="POST" enctype="multipart/form-data">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Asunto:</strong>
<input type="text" name="asunto" class="form-control" placeholder="Nombre del asunto" required>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Detalles:</strong>
<textarea class="form-control" style="height:150px" name="detail" placeholder="Detalles de la orden de servicio " required></textarea>
</div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Urgencia:</strong>
<select name="tipo_urgencia" >
<option name="tipo_urgencia" value="Baja"  placeholder="">Baja</option>
<option name="tipo_urgencia" value="Media"  placeholder="">Media</option>
<option name="tipo_urgencia" value="Alta"  placeholder="">Alta</option>
<option name="tipo_urgencia" value="Muy Alta"  placeholder="">Muy Alta</option>


</select><br></div>
</div>




<center><strong>
Adjuntar evidencia (opcional)</strong>
<input type="file" name="adjunto"  id="adjunto"/></center><br>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Status:</strong>
<input type="text"  name="estatus" class="form-control" placeholder="status" value="Pendiente"   readonly>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</div>

</form>





<script type="text/javascript">
if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.sparkline.index.min.js"></script>
<script src="assets/js/jquery.flot.min.js"></script>
<script src="assets/js/jquery.flot.pie.min.js"></script>
<script src="assets/js/jquery.flot.resize.min.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->

