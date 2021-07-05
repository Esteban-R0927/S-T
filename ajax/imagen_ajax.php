    <?php
/* Connect To Database*/
require_once "../config/db.php";
require_once "../config/conexion.php";
if (isset($_FILES["imagefile"])) {

    $target_dir    = "../img/";
    $image_name    = time() . "_" . basename($_FILES["imagefile"]["name"]);
    $target_file   = $target_dir . $image_name;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    $imageFileZise = $_FILES["imagefile"]["size"];

    /* Inicio Validacion*/
    // Allow certain file formats
    if (($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") and $imageFileZise > 0) {
        $errors[] = "<p>Lo sentimos, sólo se permiten archivos JPG , JPEG, PNG y GIF.</p>";
    } else if ($imageFileZise > 1048576) {
//1048576 byte=1MB
        $errors[] = "<p>Lo sentimos, pero el archivo es demasiado grande. Selecciona una imagen de menos de 1MB</p>";
    } else {

        /* Fin Validacion*/
        if ($imageFileZise > 0) {
            move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
            $imagen_update = "imagen_url='img/$image_name' ";

        } else { $imagen_update = "";}
        $sql              = "UPDATE usuarios SET $imagen_update WHERE id='1';";
        $query_new_insert = mysqli_query($con, $sql);

        if ($query_new_insert) {
            ?>
                        <img class="img-fluid" src="img/<?php echo $image_name; ?>" alt="imagen">
                        <?php
} else {
            $errors[] = "Lo sentimos, actualización falló. Intente nuevamente. " . mysqli_error($con);
        }
    }
}

?>
    <?php
if (isset($errors)) {
    ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Error! </strong>
        <?php
foreach ($errors as $error) {
        echo $error;
    }
    ?>
        </div>
    <?php
}
?>
