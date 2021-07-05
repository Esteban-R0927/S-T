
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$categoria=$_POST['categoria'];
	$subcategoria=$_POST['subcategoria'];
	$nombre_producto=$_POST['nombre_producto'];
	$producto_empresa=$_POST['producto_empresa'];
	$precio_producto=$_POST['precio_producto'];
	$precio_producto_descuento=$_POST['precio_producto_descuento'];
	$descripcion_producto=$_POST['descripcion_producto'];
	$costo_envio=$_POST['costo_envio'];
	$disponibilidad_producto=$_POST['disponibilidad_producto'];
	
$sql=mysqli_query($con,"update  productos set categoria='$categoria',subcategoria='$subcategoria',nombre_producto='$nombre_producto',producto_empresa='$producto_empresa',precio_producto='$precio_producto',descripcion_producto='$descripcion_producto',costo_envio='$costo_envio',disponibilidad_producto='$disponibilidad_producto',precio_producto_descuento='$precio_producto_descuento' where id='$pid' ");
$_SESSION['msg']="Producto actualizado correctamente !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Editar Productos</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategoria").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	


</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Editar productos</h3>
							</div>
							<div class="module-body">

									<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Todo bien!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh vaya!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

			<form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">

<?php 

$query=mysqli_query($con,"select productos.*,categorias.nombre_categoria as catname,categorias.id as cid,subcategoria.subcategoria as subcatname,subcategoria.id as subcatid from productos join categorias on categorias.id=productos.categoria join subcategoria on subcategoria.id=productos.subcategoria where productos.id='$pid'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
  


?>


<div class="control-group">
<label class="control-label" for="basicinput">Categoria</label>
<div class="controls">
<select name="categoria" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="<?php echo htmlentities($row['cid']);?>"><?php echo htmlentities($row['catname']);?></option> 
<?php $query=mysqli_query($con,"select * from categorias");
while($rw=mysqli_fetch_array($query))
{
	if($row['catname']==$rw['nombre_categoria'])
	{
		continue;
	}
	else{
	?>

<option value="<?php echo $rw['id'];?>"><?php echo $rw['nombre_categoria'];?></option>
<?php }} ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Subcategoria</label>
<div class="controls">

<select   name="subcategoria"  id="subcategoria" class="span8 tip" required>
<option value="<?php echo htmlentities($row['subcatid']);?>"><?php echo htmlentities($row['subcatname']);?></option>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Nombre de producto</label>
<div class="controls">
<input type="text"    name="nombre_producto"  placeholder="Ingrese nombre de producto" value="<?php echo htmlentities($row['nombre_producto']);?>" class="span8 tip" >
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Marca del producto</label>
<div class="controls">
<input type="text"    name="producto_empresa"  placeholder="Ingrese marca del producto" value="<?php echo htmlentities($row['producto_empresa']);?>" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Producto sin descuento</label>
<div class="controls">
<input type="text"    name="precio_producto_descuento"  placeholder="Ingrese precio del producto" value="<?php echo htmlentities($row['precio_producto_descuento']);?>"  class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Precio de venta del producto</label>
<div class="controls">
<input type="text"    name="precio_producto"  placeholder="Ingrese precio de venta del producto" value="<?php echo htmlentities($row['precio_producto']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Descripción del Producto</label>
<div class="controls">
<textarea  name="descripcion_producto"  placeholder="Ingrese descripción del producto" rows="6" class="span8 tip">
<?php echo htmlentities($row['descripcion_producto']);?>
</textarea>  
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Costo de envío</label>
<div class="controls">
<input type="text"    name="costo_envio"  placeholder="Ingresa costo de envio del producto" value="<?php echo htmlentities($row['costo_envio']);?>" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Disponibilidad del Producto</label>
<div class="controls">
<select   name="disponibilidad_producto"  id="disponibilidad_producto" class="span8 tip" required>
<option value="<?php echo htmlentities($row['disponibilidad_producto']);?>"><?php echo htmlentities($row['disponibilidad_producto']);?></option>
<option value="En Stock">En Stock</option>
<option value="Fuera de Stock">Fuera de Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Imagen 01 del producto</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['producto_image1']);?>" width="200" height="100"> <a href="update-image1.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Imagen 02 del producto</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['producto_image2']);?>" width="200" height="100"> <a href="update-image2.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Imagen 03 del producto</label>
<div class="controls">
<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['producto_image3']);?>" width="200" height="100"> <a href="update-image3.php?id=<?php echo $row['id'];?>">Change Image</a>
</div>
</div>
<?php } ?>
	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Actualizar</button>
											</div>
										</div>
									</form>
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