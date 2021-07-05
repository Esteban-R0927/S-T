<?php

include "conexion.php";
session_start();

//VERIFICAMOS QUE LOS CAMPOS NO ESTEN VACIOS. LA FUNCION DE ESTE 'if' ES QUE SI AL MENOS UNA VARIABLE (O CAMPO) ESTA VACIO MOSTRAR ALERTA.//
if (empty($_POST['nombre'])) {
    //MOSTRAMOS LA RESPUESTA DE PHP 'echo'//
    echo '<script>
	alert("*(Campo Obligatorio). Ingresé su primer nombre por favor!");
	window.history.go(-1);
	3#Z#rFoW~LUyG<yK
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

if (empty($_POST['rol_id'])) {
    echo '<script>
	alert("*(Campo Obligatorio). Seleccione un rol por favor!");
	window.history.go(-1);
	</script>';
    exit();
}
//---- FIN ----//

//RECIBIR LOS DATOS ALMACENADOS EN VARIABLES//
$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$contraseña=md5($_POST["contraseña"]);
$rol_id=$_POST["rol_id"];

//CONSULTA PARA INSERTAR//
$insertar = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, rol_id) VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$rol_id')";

//SE INICIA LA CONEXIÓN//
$conexion = mysqli_connect("localhost", "root", "12345678", "modelado_bsd");

//EJECUTA LA CONEXIÓN Y LA ALMACENA EN LAS VARIABLES//
$resultado = mysqli_query($conexion, $insertar);

$filas = mysqli_fetch_array($resultado);

if (!$filas) {

    echo '<script>
	alert("Registrado Exitosamente!");
	window.location = "register-admin.php";
	</script>';
} else {

    include "register-admin.php";
}

mysqli_free_result($resultado);
//CERRAR CONEXIÓN//
mysqli_close($conexion);
