<?php
session_start();
include "conexion.php";
$varsesion = $_SESSION['correo'];
if ($varsesion) {
} elseif ($varsesion == null || $varsesion = '') {
    echo '<script>
    alert("Inicia sesión para acceder a la plataforma.");
    window.location = "login.php";
    </script>';
    die();
}

$consulta  = "SELECT * FROM usuarios WHERE correo='$varsesion'";
$resultado = mysqli_query($conexion, $consulta);
$filas     = mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   $varsesion = $_SESSION['correo'];
   if ($varsesion) {
    echo $filas['id'], " ", $filas['correo'];
    }?>
    
    
</body>
</html>