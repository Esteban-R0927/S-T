
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

date_default_timezone_set('America/Lima');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pedidos Pendientes | Panel Administrativo</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span11">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Pedidos pendientes</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th>Nombre</th>
											<th width="50">Email /Teléfono</th>
											<th>Dirección de envío</th>
											<th>Producto </th>
											<th>Cantidad </th>
											<th>Monto </th>
											<th>Fecha de pedido</th>
											<th>Acción</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$status='Delivered';
$query=mysqli_query($con,"select usuarios.nombre as nombre,usuarios.correo as correo,usuarios.telefono_celular as telefono_celular,usuarios.direccion_envio as direccion_envio,usuarios.ciudad_envio as ciudad_envio,usuarios.estado_envio as estado_envio,usuarios.zipcode as zipcode,productos.nombre_producto as nombre_producto,productos.costo_envio as costo_envio,ordenes.cantidad as cantidad,ordenes.fecha_orden as fecha_orden,productos.precio_producto as precio_producto,ordenes.id as id  from ordenes join usuarios on  ordenes.usuario_id=usuarios.id join productos on productos.id=ordenes.producto_id where ordenes.estado_pedido!='$status' or ordenes.estado_pedido is null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>										
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['nombre']);?></td>
<td><?php echo htmlentities($row['correo']);?>/<?php echo htmlentities($row['telefono_celular']);?></td>
<td><?php echo htmlentities($row['direccion_envio'].",".$row['ciudad_envio'].",".$row['estado_envio']."-".$row['zipcode']);?></td>
											<td><?php echo htmlentities($row['nombre_producto']);?></td>
											<td><?php echo htmlentities($row['cantidad']);?></td>
											<td><?php echo htmlentities($row['cantidad']*$row['precio_producto']+$row['costo_envio']);?></td>
											<td><?php echo htmlentities($row['fecha_orden']);?></td>
											<td>   <a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order" target="_blank"><i class="icon-edit"></i></a>
											</td>
											</tr>

										<?php $cnt=$cnt+1; } ?>
										</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>