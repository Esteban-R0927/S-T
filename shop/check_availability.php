<?php 
require_once("includes/config.php");
if(!empty($_POST["correo"])) {
	$correo= $_POST["correo"];
	
		$result =mysqli_query($con,"SELECT  correo FROM  usuarios WHERE  correo='$correo'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Email already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
