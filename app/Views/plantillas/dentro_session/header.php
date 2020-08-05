<?php
$uri = $_SERVER['REQUEST_URI'];
$breadcrumb = '';
$tiporoluser = '';
$librerias = '';

$urlsemifull = env('urlsemifull');
$usuario_inicio_session = ($_SESSION['usuario_inicio_session'] != '') ? $_SESSION['usuario_inicio_session'] : '';

$usuario_id = ($_SESSION['usuario_id'] != '') ? $_SESSION['usuario_id'] : '';
$usuario_cedula = ($_SESSION['usuario_cedula'] != '') ? $_SESSION['usuario_cedula'] : '';
$usuario_nombre = ($_SESSION['usuario_nombre'] != '') ? $_SESSION['usuario_nombre'] : '';
$usuario_apellido = ($_SESSION['usuario_apellido'] != '') ? $_SESSION['usuario_apellido'] : '';
$usuario_telefono = ($_SESSION['usuario_telefono'] != '') ? $_SESSION['usuario_telefono'] : '';
$usuario_fecha_nac = ($_SESSION['usuario_fecha_nac'] != '') ? $_SESSION['usuario_fecha_nac'] : '';
$usuario_direccion = ($_SESSION['usuario_direccion'] != '') ? $_SESSION['usuario_direccion'] : '';
$usuario_correo = ($_SESSION['usuario_correo'] != '') ? $_SESSION['usuario_correo'] : '';
$usuario_foto = ($_SESSION['usuario_foto'] == '') ? 'assets/images/1.jpg' : $_SESSION['usuario_foto'];
$usuario_indicador_red = ($_SESSION['usuario_indicador_red'] == '') ? 'assets/images/1.jpg' : $_SESSION['usuario_indicador_red'];
$usuario_clave_red = ($_SESSION['usuario_clave_red'] == '') ? 'assets/images/1.jpg' : $_SESSION['usuario_clave_red'];
$usuario_tipo = ($_SESSION['usuario_tipo'] != '') ? $_SESSION['usuario_tipo'] : '';

switch ($usuario_tipo) {
    case '0': //Operador
    $tiporoluser = 'Operador';
    break;
    case '1': //Administrador
    $tiporoluser = 'Administrador';
    break;
    case '2': //Supervisor
    $tiporoluser = 'Supervisor';
    break;
    case '3': //Supervisor
    $tiporoluser = 'Fin de Semana';
    break;
    default:
    break;
}
$array = explode("/", $uri);
$enlace = '';
if ($array[3] == 'buscador') {
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Buscador</li>';
    $enlace = '../';
}

switch ($uri) {
    case $urlsemifull:
    break;

    case $urlsemifull.'tablas':
    $librerias .= '
    <link href="' . base_url() . '/assets/extra-libs/prism/prism.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/jquery-steps/steps.css" rel="stylesheet">

    <link href="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/extra-libs/DataTables/rowGroup.dataTables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/extra-libs/DataTables/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/dist/js/bootstrap-responsive/responsive.dataTables.min.css" rel="stylesheet">

    <link href="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="' . base_url() . '/assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">


    ';
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Tablas</li>';
    break;

    case $urlsemifull.'usuarios':
    $librerias .= '
    <link href="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/dist/js/bootstrap-responsive/responsive.dataTables.min.css" rel="stylesheet">
    ';
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Usuarios</li>';
    break;

    case $urlsemifull.'novedades':
    $librerias .= '
    <link href="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/dist/js/bootstrap-responsive/responsive.dataTables.min.css" rel="stylesheet">
    ';
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Usuarios</li>';
    break;
    

    case $urlsemifull.'reportes':
    $librerias .= '
    <link href="' . base_url() . '/assets/extra-libs/prism/prism.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/jquery-steps/steps.css" rel="stylesheet">

    <link href="' . base_url() . '/assets/extra-libs/DataTables/datatables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/extra-libs/DataTables/rowGroup.dataTables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/extra-libs/DataTables/fixedColumns.dataTables.min.css" rel="stylesheet">
    <link href="' . base_url() . '/dist/js/bootstrap-responsive/responsive.dataTables.min.css" rel="stylesheet">

    <link href="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="' . base_url() . '/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    ';
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Reportes</li>';
    break;

    case $urlsemifull.'graficas':
    $librerias .= '
    <link href="' . base_url() . '/assets/extra-libs/prism/prism.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/dragula/dist/dragula.min.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="' . base_url() . '/assets/libs/daterangepicker/daterangepicker.css" rel="stylesheet">
    ';
    $breadcrumb = '<li class="breadcrumb-item active" aria-current="page">Gráficas</li>';
    break;

    default:
    break;
}
$librerias .= '
<link href="' . base_url() . '/assets/libs/dropzone/dist/min/dropzone.min.css" rel="stylesheet"/>
<link href="' . base_url() . '/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">    
<link href="' . base_url() . '/dist/css/style.min.css" rel="stylesheet">
<link href="' . base_url() . '/dist/css/estilosagregados.css" rel="stylesheet">
';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>SGO</title>
    <?= $librerias; ?>
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <input type="hidden" name="idusuarioweb" id="idusuarioweb" value="<?= $usuario_id; ?>">
        <input type="hidden" name="tipousuarioweb" id="tipousuarioweb" value="<?= $usuario_tipo; ?>">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-dark d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand text-center" href="<?= base_url() ?>">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            SGO
                        </b>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" id="sidebartogglerbtn" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24" style="color: #757272;"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?= base_url() ?>/<?= $usuario_foto ?>" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <a href="javascript:void(0)">
                                            <img src="<?= base_url() ?>/<?= $usuario_foto ?>" alt="user" class="img-circle" width="60" onclick='verImagenDetallada("<?= base_url() ?>/<?= $usuario_foto ?>")'>
                                        </a>
                                    </div>
                                    <div class="m-l-10">
                                        <div class="d-none" id="usuario_inicio_session"><?= $usuario_inicio_session ?></div>
                                        <h4 class="m-b-0"><?= $usuario_nombre . " " . $usuario_apellido ?></h4>
                                        <p class=" m-b-0"><?= $usuario_correo ?></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="editarusuariodatatable(<?php echo "'" . $usuario_id . "',
                                    '" . $usuario_cedula . "',
                                    '" . $usuario_nombre . "',
                                    '" . $usuario_apellido . "',
                                    '" . $usuario_telefono . "',
                                    '" . $usuario_fecha_nac . "',
                                    '" . $usuario_direccion . "',
                                    '" . $usuario_correo . "',
                                    '" . $usuario_foto . "',
                                    '" . $usuario_indicador_red . "',
                                    '" . $usuario_clave_red . "',
                                    '" . $usuario_tipo . "',
                                    '1',
                                    '" . $usuario_tipo . "'"; ?>)">
                                    <i class="ti-user m-r-5 m-l-5"></i> Editar Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:salir()" id="btnsalir">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Salir
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown mt-3">
                                <div class="user-pic">
                                    <a class="waves-effect waves-dark" href="javascript:void(0)">
                                        <img src="<?= base_url() ?>/<?= $usuario_foto ?>" alt="user" class="rounded-circle" width="45" onclick='verImagenDetallada("<?= base_url() ?>/<?= $usuario_foto ?>")'>
                                    </a>
                                </div>
                                <div class="user-content hide-menu ml-2">
                                    <h5 class="mb-0 user-name font-medium"><?= $usuario_nombre . " " . $usuario_apellido ?></h5>
                                    <span class="op-5 user-email"><?= $tiporoluser ?></span>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>" aria-expanded="false">
                                <i class="icon-home"></i>
                                <span class="hide-menu active">Inicio</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/tablas" aria-expanded="false">
                                <i class="fas fa-table"></i>
                                <span class="hide-menu">Tablas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/novedades" aria-expanded="false">
                                <i class="fas icon-note"></i>
                                <span class="hide-menu">Novedades</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/reportes" aria-expanded="false">
                                <i class="fas ti-search"></i>
                                <span class="hide-menu">Reportes</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/graficas" aria-expanded="false">
                                <i class="fas ti-search"></i>
                                <span class="hide-menu">Gráficas</span>
                            </a>
                        </li>
                        <?php if ($usuario_tipo == '1'): ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-ungroup"></i>
                                <span class="hide-menu">Administrar</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url() ?>/usuarios" aria-expanded="false">
                                        <i class="icon-people"></i>
                                        <span class="hide-menu">Usuarios</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif ?>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Página actual</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
                                    <?php echo $breadcrumb; ?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="">
                                <h4 class="text-info m-b-0 font-medium" id="fechaactual"></h4>
                                <small id="horaactual"></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <?php
                    //Esta variable viene desde el controlador Route.php
                echo view($vistafull);
                echo view('administracion/usuarios/modaleditarusuario');
                echo view('administracion/general/modalverimagen');
                ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Desarrollado por Elio Duran --- 2020
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>