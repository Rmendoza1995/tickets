<?php
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
session_destroy();
/* Aquí redireccionas a la url especifica */
header("Location: index.php");
die();  
}
$_SESSION['tiempo']=time();
?>

<?php


include("configuracion.php");
if(isset($_GET['id'])){
$id = $_GET['id'];//le asigno una variable 
$query1 = "SELECT * FROM ordenes WHERE id =".$id; 
if($result = mysqli_query($link, $query1)){ 
while($usuario = mysqli_fetch_assoc($result)){ 
$asunto = $usuario['asunto']; 
$detail = $usuario['detail'];
$adicional = $usuario['adicional'];
$que = $usuario['que'];
$fecha_resolucion = $usuario['fecha_resolucion'];
$estatus = $usuario['estatus'];

}
}

}





if(isset($_POST['sw']) == 1){ 

$query2 = "UPDATE ordenes SET que='".$_POST['que']."',adicional='".$_POST['adicional']."',updated_at= NOW() WHERE id=".$_POST['id'];
if(mysqli_query($link, $query2)){ 
header("Location: index2.php");
echo'<script type="text/javascript">
alert("Debes iniciar sesion");
window.location.href="index2.php";
</script>';
}else{ 
echo "Ocurrio un error al intentar actualizar"; 
}
}







if(isset($_POST['enter']) == 2){ 
   $adjunto = (isset($_FILES['adjunto'])) ? $_FILES['adjunto'] : null;
   $ruta_destino_archivo = "archivos/{$adjunto['name']}";
   $archivo_ok = move_uploaded_file($adjunto['tmp_name'], $ruta_destino_archivo);
   

$query5 = "UPDATE ordenes SET que='".$_POST['que']."',firma='".$_SESSION['usuario']."', estatus='Resuelto' ,updated_at= NOW(),adjunto='".$adjunto["name"]."' WHERE id=".$_POST['id'];
if(mysqli_query($link, $query5)){ 

header("Location: index2.php");
}else{ 
echo "Ocurrio un error al intentar actualizar";
var_dump($query2);
 //mensaje de error
}

}


//cierro conexion a bbdd

mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>





<style type="text/css">

</style>
</head>

<body class="no-skin">






<!-- MOSTRAR EL MENU  -->
<!-- /.nav-list -->
</ul>


</div>






<body>



<div style="background-color:transparent  ;">
<h3>Editar Orden de servicio</h3><div class="pull-right">
<button onclick="goBack()" class="btn btn-primary">Atras</button>

</div>
<script>
function goBack() {
window.history.back();
}
</script>
<center><form action="upd2.php" method="post" >
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Asunto:</strong>
<input type="text" name="asunto" disabled value="<?php if(isset($asunto)) echo $asunto; ?>" class="form-control" placeholder="Asunto">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Detalles:</strong>
<textarea class="form-control" disabled style="height:150px" name="detail" placeholder="Detalles"><?php if(isset($detail)) echo $detail; ?></textarea>
</div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Agregar Comentarios o Dudas:</strong>
<textarea class="form-control" style="height:150px" name="adicional" placeholder="comentarios"><?php if(isset($adicional)) echo $adicional; ?></textarea>
</div>
</div>
<center>
<center> 

<br><br>
<input class="btn btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
<input type="hidden" name="sw" value="1" />
</form>


<!--FIRMA-->

<form action="upd2.php" method="post"  enctype="multipart/form-data" >
<div class="col-xs-12 col-sm-12 col-md-12">
<input type="text" disabled style="text-align: center;"  Title="STATUS ACTUAL" value="<?php if(isset($estatus)) echo $estatus; ?>" >
<div class="form-group">
<strong>¿Terminar el trabajo?:</strong>
<textarea class="form-control" style="height:150px" name="que" placeholder="¿Que se realizo?" required><?php if(isset($que)) echo $que; ?></textarea>
<strong>
Recuerda adjuntar tú archivo para validar tú trabajo.</strong>
<input type="file" name="adjunto" required="required" /><br>
</div>
</div>
<?php if (isset($adjunto)): ?>
<?php if ($archivo_ok): ?>
<strong> El archivo ha sido subido correctamente. </strong>
<?php else: ?>
<span style="color: #f00;"> Error al intentar subir el archivo. </span>
<?php endif; ?>
<?php endif; ?>

<input class="btn btn-danger" type="submit" name="actualizar" value="Firmar Ahora" title="Una vez firmado no puedes revocar firma" /><br /><br />
<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
<input type="hidden" name="enter" value="2" />
</form>
</div>


</body>
</html>