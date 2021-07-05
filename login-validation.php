<?php

include "conexion.php";
session_start();


//VERIFICAMOS QUE LOS CAMPOS NO ESTEN VACIOS. LA FUNCION DE ESTE 'if' ES QUE SI AL MENOS UNA VARIABLE (O CAMPO) ESTA VACIO MOSTRAR ALERTA.//
if (empty($_POST['correo'])) {
	//MOSTRAMOS LA RESPUESTA DE PHP 'echo'//
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé su correo");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['contraseña'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé su contraseña");
	window.history.go(-1);
	</script>';
	exit();
}
//---- FIN ----//

//RECIBIR LOS DATOS ALMACENADOS EN VARIABLES//
$correo = $_POST["correo"];
$contraseña=md5($_POST["contraseña"]);

$_SESSION['correo'] = $correo;
$varsesion = $_SESSION['correo'];

//SE INICIA LA CONEXIÓN//
$conexion = mysqli_connect("localhost", "root", "", "modelado_bsd");

//CONSULTA PARA INSERTAR//
$consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND contraseña = '$contraseña'";

//EJECUTA LA CONEXIÓN Y LA ALMACENA EN LAS VARIABLES//
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas['rol_id'] == 1) { //Administrador

	echo '<script>
	alert("Bienvenido al Panel Administrativo");
	window.location = "admin.php";
	</script>';
} else
if ($filas['rol_id'] == 2) { //Cliente

	echo '<script>
	alert("Bienvenido");
	window.location = "inicio.php";
	</script>';
} else {

	echo '<script>
	alert("ERROR EN LA AUTENTIFICACIÓN");
	window.location = "login.php";
	</script>';
}

mysqli_free_result($resultado);
//CERRAR CONEXIÓN//
mysqli_close($conexion);
