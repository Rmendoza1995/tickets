<html>
<head>
<link rel="stylesheet" href="//bootstrap-extension.com/css/4.5.1/bootstrap-extension.min.css" type="text/css">
<script src="//bootstrap-extension.com/js/4.5.1/bootstrap-extension.min.js"></script>

<head>
</html>

<?php
ini_set('display_errors', '1'); ini_set('display_startup_errors', '1'); error_reporting(E_ALL);

    session_start();
   
include("configuracion.php");
if (mysqli_connect_errno()) {
    echo "Error connecting to database. ".mysqli_connect_error();
}



$adjunto = (isset($_FILES['adjunto'])) ? $_FILES['adjunto'] : null;
$ruta_destino_archivo = "archivos/{$adjunto['name']}";
$archivo_ok = move_uploaded_file($adjunto['tmp_name'], $ruta_destino_archivo);

$asunto=!empty($_POST['asunto']) ? $_POST['asunto'] : NULL;
$detail=!empty($_POST['detail']) ? $_POST['detail'] : NULL;
$tipo_urgencia=!empty($_POST['tipo_urgencia']) ? $_POST['tipo_urgencia'] : NULL;
$estatus=!empty($_POST['estatus']) ? $_POST['estatus'] : NULL;

$sql="INSERT INTO ordenes (asunto, detail,quien_solicita, tipo_urgencia, estatus, adjunto) 
VALUES  ('$asunto','$detail','".$_SESSION['usuario']."', '$tipo_urgencia', '$estatus','".$adjunto["name"]."')";

$data = mysqli_query($link, $sql);
if($data)
{
  echo'<script type="text/javascript">
    alert("Guardado Exitosamente!");
    window.location.href="supervisor.php";
  </script>';
}else{
  echo 'error';
  var_dump($sql);
}



$sqlip="SELECT * FROM useros WHERE usuario='".$_SESSION['usuario']."' ";

$datas = mysqli_query($link, $sqlip);






/*
use PHPMailer\PHPMailer\PHPMailer; use PHPMailer\PHPMailer\Exception; require 'PHPMailer/src/Exception.php'; require 'PHPMailer/src/PHPMailer.php'; require 'PHPMailer/src/SMTP.php';
 


$mail = new PHPMailer();
$mail->isSMTP();                                      // Indicamos que use SMTP
$mail->Host = 'mail.Omnibus.com.mx';  // Indicamos los servidores SMTP
$mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
$mail->Username = 'helpdesk@Omnibus.com.mx';                 // SMTP username
$mail->Password = 'sPeteRtH';                           // SMTP password
$mail->SMTPSecure = 'STARTTLS';                            // Habilitar encriptación TLS o SSL
$mail->Port = 587;                                    // TCP port


while($usuario = mysqli_fetch_assoc($datas)):*/


/** Configurar cabeceras del mensaje **/
/*
$mail->From = 'helpdesk@Omnibus.com.mx';                       // Correo del remitente
$mail->FromName = 'O.S de servicio Omnibus';           // Nombre del remitente
$mail->Subject = 'Hola se ha enviado tú orden de servicio ';                // Asunto
*/
/** Incluir destinatarios. El nombre es opcional **/
/*
$mail->addCC('it@Omnibus.com.mx', 'sistemas');
$mail->addAddress($usuario['correoe']);

endwhile;
mysqli_free_result($datas); 

/** Con RE, CC, BCC **//*
$mail->addReplyTo('info@correo.com', 'Informacion');
$mail->addCC('cc@correo.com');
$mail->addBCC('bcc@correo.com');*/

/** Incluir archivos adjuntos. El nombre es opcional **/


 
/** Enviarlo en formato HTML **/
/*
$mail->isHTML(true);                                  
$mail->CharSet = 'UTF-8';

/** Configurar cuerpo del mensaje **/
/*
$mail->Body    = 

'<div>'.'Estimado: '.'</b>' .$_SESSION['usuario'].'<br>'.

'<div>'.'Hemos recibido y asignado su solicitud a uno de nuestros consultores.'.''.

'<div>'.'En un momento será contactado al area de sistemas para brindarle una solución.'.'</br></br></br>'.


'<div style="">Asunto: '.$asunto.'</br></br></br></br>'.
'<div style="">'.'Más Detalles: ' .$detail.'</br></br></br>'.
'<div style="">'.'Su solicitud tiene una prioridad: ' .$tipo_urgencia.'</br><br>'.
'<div>'.'En breve uno de nuestros personales de Soporte Tecnico te asistira para ayudarte en tú orden de servicio.'.'</div>'.

''.'Agradecemos su apoyo para canalizar toda solicitud  través de nuestro portal web para brindarle un seguimiento oportuno a sus solicitudes.'.'<br><br><br><br>'.

'<div style="color:blue">'.'HelpDesk Omnibus Soporte.'.'</div><br>'.
'<div >'.'Área de IT Omnibus
'.'<br>Ext: 2080-2081-2065<div>'
;
/*$mail->AltBody = 'Este es el mansaje en texto plano para clientes que no admitan HTML';*/

/** Para que use el lenguaje español **/
/*
$mail->setLanguage('es');

/** Enviar mensaje... **/
/*
if(!$mail->send()) {
    echo 'El mensaje no pudo ser enviado.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
   
    echo'
    <div class="alert alert-primary" role="alert">
    Hola '.$_SESSION['usuario']. '<br>'. 
     'Gracias por Asignar una nueva O.S con el nombre'.$asunto.
    '
    Su mensaje a sido enviado  exitosamente...
    Se atendera lo antes posible!
</div>'
;}*/

?>

<html>
<body onLoad="redireccionar()">

    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <script >
  setTimeout('window.location.href="supervisor.php"',10000);

  </script>
</head>
</html>



