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
	$id = $_GET['id'];
	$query1 = "SELECT * FROM ordenes WHERE id =".$id; 
	if($result = mysqli_query($link, $query1)){ 
		while($usuario = mysqli_fetch_assoc($result)){ 
                $asunto = $usuario['asunto'];  
                $detail = $usuario['detail'];
                $adicional = $usuario['adicional'];
                $que = $usuario['que'];
                $tipo_urgencia = $usuario['tipo_urgencia'];
                $estatus = $usuario['estatus'];
                $inc = $usuario['inc'];



		}
	}

}

if(isset($_POST['sw']) == 1){ 

	$query2 = "UPDATE ordenes SET que='".$_POST['que']."',adicional='".$_POST['adicional']."',estatus='".$_POST['estatus']."' ,updated_at= NOW() WHERE id=".$_POST['id'];
	if(mysqli_query($link, $query2)){ 
        header("Location: admin.php");
      
	}else{ 
		echo "Ocurrio un error al intentar actualizar"; 
	}
}



if(isset($_POST['enter']) == 2){ 
   $query5 = "UPDATE ordenes SET que='".$_POST['que']."',firma='".$_SESSION['usuario']."', estatus='Resuelto' ,updated_at= NOW() WHERE id=".$_POST['id'];
	if(mysqli_query($link, $query5)){ 
        header("Location: admin.php");
	}else{ 
		echo "Ocurrio un error al intentar actualizar"; 
	}
}
if(isset($_POST['entero']) == 3){$query5 = "UPDATE ordenes SET inc='".$_POST['inc']."',estatus='Incidencia' ,updated_at= NOW() WHERE id=".$_POST['id'];
	if(mysqli_query($link, $query5)){ 
        header("Location: admin.php");
	}else{ 
		echo "Ocurrio un error al intentar actualizar"; 
	}
}
mysqli_close($link);
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>





<style type="text/css">

</style>
</head>

<body class="no-skin">







</ul>

</div>






<body>
	<div style="background-color:transparent  ;">
		<h3>Editar Orden de servicio</h3> 			 <div class="pull-right">
                <button onclick="goBack()" class="btn btn-primary">Atras</button>

            </div>
<script>
function goBack() {
  window.history.back();
}
</script>
		<center><form action="upd1.php" method="post" >
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
                    <strong>Agregar comentarios o dudas:</strong>
                    <textarea class="form-control" style="height:150px" name="adicional" placeholder="comentarios"><?php if(isset($adicional)) echo $adicional; ?></textarea>
                </div>
            </div>
            <center>
           <center> 
              <br><br>
            
<select name="estatus">
<option name="estatus" value="<?php if(isset($estatus)) echo $estatus; ?>" ><?php if(isset($estatus)) echo $estatus; ?></option>
<option value="Resuelto" <?php if(!$estatus=="Resuelto"){echo"selected";}?>>Resuelto</option>
<option value="Incidencia" <?php if(!$estatus=="Incidencia"){echo"selected";}?>>Incidencia</option>
<option value="Pendiente" <?php if(!$estatus=="Pendiente"){echo"selected";}?>>Pendiente</option>
</select><br>


<br><br>
			<input class="btn btn-success" type="submit" name="actualizar" value="Actualizar" /><br /><br />
			<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
			<input type="hidden" name="sw" value="1" />
            </form>

			<form action="upd1.php" method="post" >
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>¿Terminar el trabajo?:</strong>
                    <textarea class="form-control" style="height:150px" name="que" placeholder="¿Que se realizo?"><?php if(isset($que)) echo $que; ?></textarea>
                </div>
            </div>
           
        
            
        <input class="btn btn-danger" type="submit" name="actualizar" value="Firmar Ahora" title="Una vez firmado no puedes revocar firma" /><br /><br />
			<input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
            <input type="hidden" name="enter" value="2" />
            
</form>


    <form action="upd1.php" method="post" >
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>¿Cambiar a INC?:</strong>
    <textarea class="form-control" style="height:150px" name="inc" placeholder="¿Que se realizo mal?"><?php if(isset($que)) echo $que; ?></textarea>
    </div>
    </div>



    <input class="btn btn-danger" type="submit" name="actualizar" value="Cambiar"  /><br /><br />
    <input type="hidden" name="id" value="<?php if(isset($id)) echo $id; ?>" />
    <input type="hidden" name="entero" value="3" />

    </form>
	</div>



</body>
</html>