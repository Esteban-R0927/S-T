<?php 

$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'b31625f5401a4e';
$phpmailer->Password = 'b044c5c085f6cc';

$phpmailer->setFrom($correo, $nombre); //DE
$phpmailer->addAddress('estebanorestrepo@gmail.com','Jorge Esteban Orlas Restrepo'); //PARA
$phpmailer->isHTML(true);

$phpmailer->Subject = "SERVICIO & TROQUELADOS - S&T";
$phpmailer->Body = "De: $nombre <br>";
$phpmailer->Body .= "Mensaje: $mensaje <br>"; //plantilla de correo electronico html phpmailer
$phpmailer->Body .= "N&uacute;mero de contacto: $contacto";
$phpmailer->AltBody = 'This is the plain text version of the email content';

if(!$phpmailer->send()){
    echo "Error al enviar mensaje: " . $mail->ErrorInfo;
}else{
    echo file_get_contents('enviado.php');
}
?>

<!-- //llamado de campos
$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

//datos para el correo
$destinatario = "estebanorestrepo@gmail.com";
$asunto = "CONTACTO DESDE NUESTRA PLATAFORMA WEB";

$recado = "De: $nombre \n";
$recado .= "Correo Electrónico: $correo \n";
$recado .= "Teléfono: $contacto \n";
$recado .= "Mensaje: $mensaje";

//Enviando mensaje
mail($destinatario, $asunto, $recado);
header('Location:enviado.php');

?> -->