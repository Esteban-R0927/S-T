<?php
$conexion = mysqli_connect("localhost", "root", "12345678", "modelado_bsd");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Litografía S&T - Registro</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/all.css" rel="stylesheet">
    <link href="img/icon.png" rel="icon">

</head>

<body class="bg-gradient-primary">

    <div class="container"><br>

        <div class="card o-hidden border-0 shadow-lg my-4">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crea una cuenta!</h1>
                            </div>
                            <form class="user" action="register-validation.php" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="nombre" placeholder="Primer Nombre">
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="apellido" placeholder="Primer Apellido">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <center>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control text-center form-control-user" name="telefono_celular" placeholder="Teléfono/Celular">
                                    </div>
                                    </center>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="correo" placeholder="Dirección de correo electrónico">
                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="contraseña" placeholder="Contraseña">
                                    </div>

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="confirmar_contraseña" placeholder="Confirmar Contraseña">
                                    </div>

                                </div>
                                
                                <div class="form-group row">
                                    <!-- <center>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user" name="contraseña" placeholder="Confirmar Contraseña">
                                        </div>
                                    </center> -->
                                    <style>
                                        .form-select {
                                            outline: none;
                                            border-radius: 10px;
                                            margin-left: 3px;
                            
                                        }
                                        label {
                                            margin-left: 3px;
                                        }
                                    </style>
                                    <!-- <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="">Selecciona un rol:</label><br>
                                        
                                        <select class="form-select form-select-sm" name="rol_id" id="">
                                            
                                            <?php
                                            $query = $conexion->query("SELECT * FROM roles WHERE id = 2");
                                            while ($valores = mysqli_fetch_array($query)) {
                                                echo '<option value="' . $valores["id"] . '">' . $valores["rol"] . '</option>';
                                            }
                                            ?>
                                            <option value=""></option>
                                        </select>
                                    </div> -->

                                </div>
                                <button onsubmit="validate(event)" class="btn btn-primary btn-user btn-block"><i class="fas fa-registered"></i>
                                    Registrar cuenta
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">¿Has olvidado tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya tienes una cuenta? ¡Iniciar sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        function validate(e) {
            e.preventDefault();
            console.log('Test');
        }
    </script>

</body>

</html>