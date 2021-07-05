
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
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
	$producto_image1=$_FILES["producto_image1"]["name"];
	$producto_image2=$_FILES["producto_image2"]["name"];
	$producto_image3=$_FILES["producto_image3"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from productos");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["producto_image1"]["tmp_name"],"productimages/$productid/".$_FILES["producto_image1"]["name"]);
	move_uploaded_file($_FILES["producto_image2"]["tmp_name"],"productimages/$productid/".$_FILES["producto_image2"]["name"]);
	move_uploaded_file($_FILES["producto_image3"]["tmp_name"],"productimages/$productid/".$_FILES["producto_image3"]["name"]);
$sql=mysqli_query($con,"insert into productos(categoria,subcategoria,nombre_producto,producto_empresa,precio_producto,descripcion_producto,costo_envio,disponibilidad_producto,producto_image1,producto_image2,producto_image3,precio_producto_descuento) values('$categoria','$subcategoria','$nombre_producto','$producto_empresa','$precio_producto','$descripcion_producto','$costo_envio','$disponibilidad_producto','$producto_image1','$producto_image2','$producto_image3','$precio_producto_descuento')");
$_SESSION['msg']="Product Inserted Successfully !!";

}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Insertar Producto | Panel Administrativo</title>
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
			<div class="span11">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Insertar Producto</h3>
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

<div class="control-group">
<label class="control-label" for="basicinput">Categoria</label>
<div class="controls">
<select name="categoria" class="span8 tip" onChange="getSubcat(this.value);"  required>
<option value="">Seleccione categoria</option> 
<?php $query=mysqli_query($con,"select * from categorias");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['nombre_categoria'];?></option>
<?php } ?>
</select>
</div>
</div>

									
<div class="control-group">
<label class="control-label" for="basicinput">Sub Categoria</label>
<div class="controls">
<select   name="subcategoria"  id="subcategoria" class="span8 tip" required>
</select>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Nombre del producto</label>
<div class="controls">
<input type="text"    name="nombre_producto"  placeholder="Ingrese nombre del producto" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Marca del Producto</label>
<div class="controls">
<input type="text"    name="producto_empresa"  placeholder="Ingrese marca del producto" class="span8 tip" required>
</div>
</div>
<div class="control-group">
<label class="control-label" for="basicinput">Precio de producto sin descuento</label>
<div class="controls">
<input type="text"    name="precio_producto_descuento"  placeholder="Ingrese descuento del producto" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Precio del producto con descuento(Precio de venta)</label>
<div class="controls">
<input type="text"    name="precio_producto"  placeholder="Ingrese precio de venta" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Descripción del producto</label>
<div class="controls">
<textarea  name="descripcion_producto"  placeholder="Ingrese descripción del producto" rows="6" class="span8 tip">
</textarea>  
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Costo de envío</label>
<div class="controls">
<input type="text"    name="costo_envio"  placeholder="Ingres costo de envio" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Disponibilidad de Producto</label>
<div class="controls">
<select   name="disponibilidad_producto"  id="disponibilidad_producto" class="span8 tip" required>
<option value="">Seleccionar</option>
<option value="En Stock">En Stock</option>
<option value="Fuera de Stock">Fuera de Stock</option>
</select>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Imagen 01 del producto</label>
<div class="controls">
<input type="file" name="producto_image1" id="producto_image1" value="" class="span8 tip" required>
</div>
</div>


<div class="control-group">
<label class="control-label" for="basicinput">Imagen 02 del producto</label>
<div class="controls">
<input type="file" name="producto_image2"  class="span8 tip" required>
</div>
</div>



<div class="control-group">
<label class="control-label" for="basicinput">Imagen 03 del producto</label>
<div class="controls">
<input type="file" name="producto_image3"  class="span8 tip">
</div>
</div>

	<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Publicar</button>
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