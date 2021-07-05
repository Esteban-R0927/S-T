<?php

//VERIFICAMOS QUE LOS CAMPOS NO ESTEN VACIOS. LA FUNCION DE ESTE 'if' ES QUE SI AL MENOS UNA VARIABLE (O CAMPO) ESTA VACIO MOSTRAR ALERTA.//
if (empty($_POST['nombre'])) {
	//MOSTRAMOS LA RESPUESTA DE PHP 'echo'//
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé su primer nombre por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['apellido'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé su primer apellido por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['correo'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé un correo valido por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['contraseña'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé una contraseña por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['confirmar_contraseña'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingresé una contraseña por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

if (!($_POST['contraseña'] === $_POST['confirmar_contraseña'])) {
	echo '<script>
	alert("las contraseñas no coinciden");
	window.history.go(-1);
	</script>';
	exit();
}

if (empty($_POST['telefono_celular'])) {
	echo '<script>
	alert("*(Campo Obligatorio). Ingrese un número de contacto por favor!");
	window.history.go(-1);
	</script>';
	exit();
}

// if (empty($_POST['rol_id'])) {
// 	echo '<script>
// 	alert("*(Campo Obligatorio). Seleccione un rol por favor!");
// 	window.history.go(-1);
// 	</script>';
// 	exit();
// }
//---- FIN ----//

//RECIBIR LOS DATOS ALMACENADOS EN VARIABLES//
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$contraseña = md5($_POST["contraseña"]);
$telefono_celular = $_POST["telefono_celular"];
// $rol_id = $_POST["rol_id"];

// $contraseña['where'] = array(
            
//             'contraseña' => md5($_POST["contraseña"])
//         );

//CONSULTA PARA INSERTAR//
$insertar = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, telefono_celular) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$telefono_celular)";

//SE INICIA LA CONEXIÓN//
$conexion = mysqli_connect("localhost", "root", "12345678", "modelado_bsd");

//EJECUTA LA CONEXIÓN Y LA ALMACENA EN LAS VARIABLES//
$resultado = mysqli_query($conexion, $insertar);

$filas = mysqli_fetch_array($resultado);

if (!$filas) {

	echo '<script>
	alert("Registrado Exitosamente!");
	window.location = "login.php";
	</script>';
} else {

	include("register.php");
}

mysqli_free_result($resultado);
//CERRAR CONEXIÓN//
mysqli_close($conexion);
