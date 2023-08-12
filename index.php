

<!DOCTYPE HTML>

<html lang="es">

<head>
	<title>HelpDesk</title>
	<!--meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Cloud Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements"	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/fontawesome-all.css">

<link href="//fonts.googleapis.com/css?family=Encode+Sans+Condensed:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext,vietnamese" rel="stylesheet"-->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>


	@media (max-width: 600px) {
  .cloud {
    display: none;
  }
}
.enmarcado{
	padding: 6px 10px;
  background-color: #1200A6 ;
  border-radius: 20px;
  width: 270px;	
  color:white;
}

.contine{
	position: relative;
    top: -5px; /* ajustar los valores para mover la imagen */
    left:420px;

}


	</style>
<body>

<!-- Registro -->

<div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crea una cuenta</h4>
        </div>
        <div class="modal-body">

<form action="conexion.php" method="post">
<div class="icon1">
<i class="fa fa-user" aria-hidden="true"></i>
<i class="fas fa-user"></i>
Nombre Completo
</label><br>
<input  type="text" class="form-control" placeholder="" name="nombre" required=""/>
</div><br>
<div class="icon1">
<i class="fa fa-user" aria-hidden="true"></i>
<i class="fas fa-user"></i>
Usuario
</label><br>
<input  type="text" class="form-control" placeholder="" name="usuario" required=""/>
</div>
<br>
<div class="icon1">
<i class="fa fa-user" aria-hidden="true"></i>
<i class="fas fa-user"></i>
Correo Electronico
</label><br>
<input  type="email" class="form-control" placeholder="" name="correoe" required=""/>
</div>
<br>

<div class="icon1">
<i class="fa fa-lock" aria-hidden="true"></i>
<i class="fas fa-user"></i>
Password
</label><br>
<input type="password" class="form-control" placeholder="" name="Password" required=""/>
</div>
<br>
<div class="icon1">
<i class="fa fa-lock" aria-hidden="true"></i>
<i class="fas fa-user"></i>
Confirma Password
</label><br>
<input type="password" class="form-control" placeholder="" name="repassword" required=""/>
</div>
<br><i class="fas fa-user"></i>
Nivel</label><br>
<select name="levely" class="form-control">
<option name="levely" value="3"  placeholder="">Usuario</option>


</select><br>
<div class="bottom">
<input type="submit"  name="enviar" class="btn btn-primary" value="Crear Cuenta" />
</div>

</form>	
<img src="logo.png" class="contine" width="120px">



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar Ventana</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
  <!-- fin Registro -->





  <center><br>
  <br>

  <div class="enmarcado">

	<h1>
	HelpDesk 
	</h1>


  

<form action="verificar.php" method="post">
<div class="form-style-agile">
<label>
<i class="fas fa-user"></i>
Usuario
</label><br>
<input placeholder="Usuario" name="usuario" style="color:black;"  type="text" required="">
</div>
<div class="form-style-agile">
<label>
<i class="fas fa-unlock-alt"></i>
Contraseña
</label><br>
<input placeholder="Password" style="color:black;" name="Password" id="Password" type="password" required="">
</div><br>
<input type="submit" class="btn btn-success"value="Iniciar Sesion">
</form>
<br>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Registrate</button>

</div>
</div>


</div>
<br><br><br><br><br><br><br>
<img src="logo.png" width="30%">





</body>

</html>