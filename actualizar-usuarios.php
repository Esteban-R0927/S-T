<?php
include ("conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono_celular = $_POST['telefono_celular'];

$actualizar = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$correo', telefono_celular='$telefono_celular' WHERE id='$id'";

$resultado = mysqli_query($conexion, $actualizar);

if ($resultado) {
	echo '<script>
	alert("Actualizado Exitosamente!");
	window.location = "tabla_usuarios.php";
	</script>';
} else {
	echo "<script>alert('No se pudo actualizar los datos'); window.history.go(-1);</script>";
}

?>