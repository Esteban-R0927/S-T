<?php
include ("conexion.php");

$id = $_GET['id'];
$eliminar = "DELETE FROM usuarios WHERE id='$id'";

$resultado = mysqli_query($conexion, $eliminar);

if ($resultado) {


	echo '<script>
	alert("Eliminado Exitosamente!");
	window.location = "tabla_usuarios.php";
	</script>';
} else {
	echo "<script>alert('No se pudo eliminar'); window.history.go(-1);</script>";
}
?>