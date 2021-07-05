<?php
session_start();
error_reporting(0);
include('conexion.php');

if(isset($_POST['cambiar']))
{
   $correo=$_POST['correo'];
    $contraseña=md5($_POST['contraseña']);
$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo='$correo'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="forgot-password.php";
mysqli_query($conexion,"update usuarios set contraseña='$contraseña' WHERE correo='$correo' ");
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="Password Changed Successfully";
exit();
}
else
{
$extra="forgot-password.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
$_SESSION['errmsg']="el correo ingresado no existe.";
exit();
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litografía S&T - Recuperar Contraseña</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/all.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">¿Olvidaste tu contraseña?</h1>
                                            <span style="color:red;" class="text-center">
                                                <?php
                                                echo htmlentities($_SESSION['errmsg']);
                                                ?>
                                                <?php
                                                echo htmlentities($_SESSION['errmsg']="");
                                                ?>
                                            </span><p>
                                        <p class="mb-4 text-center">Lo entendemos, pasan cosas. Sólo tienes que introducir tu dirección de correo electrónico a continuación.</p>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="correo" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Introduzca la dirección de correo electrónico" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="contraseña" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="contraseña" class="form-control form-control-user" id="exampleInputPassword" placeholder="Confirmar Contraseña" required="">
                                        </div>
                                        <!-- <a href="#" class="btn btn-primary btn-user btn-block"><i class="fas fa-key"></i>
                                            Restablecer la contraseña
                                        </a> -->
                                        <button type="submit" name="cambiar" class="btn btn-primary btn-user btn-block"><i class="fas fa-sign-in-alt"></i> Restablecer la contraseña</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crea una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>