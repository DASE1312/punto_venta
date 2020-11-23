<?php
$user_session = session();
$user_session = session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PUNTO DE VENTA</title>

    <link href="<?php echo base_url(); ?>/assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>/css/fontsicon.css">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?php echo base_url(); ?>/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-fondo-image">
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesion!</h1>
                                    </div>
                                    <form method="POST" autocomplete="off" class="card-body" action="<?php echo base_url(); ?>/usuarios/valida">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese su usuario..." >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <?php if (isset($validation)) {?>
                                        <div class="alert alert-danger">
                                            <?php echo $validation->listErrors(); ?>
                                        </div>
                                    <?php }?>

                                    <?php if (isset($error)) {?>
                                        <div class="alert alert-danger">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php }?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website<?php echo date('Y'); ?></span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>/assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>/assets/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>/js/sb-admin-2.min.js"></script>
</body>
</html>