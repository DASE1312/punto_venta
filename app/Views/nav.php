<?php
$user_session = session();
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Punto Ventas</div>
    </a>
    <hr class="sidebar-divider my-0">
        <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Interface
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-shopping-basket"></i>
            <span>Productos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/categorias">Categorias</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/productos">Productos</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/unidades">Unidades</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Clientes</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/clientes">Clientes</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-truck"></i>
            <span>Compras</span>
        </a>
        <div id="collapsefour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/compras/nuevo">Nueva compra</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/compras">Compras</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-cash-register"></i>
            <span>Caja</span>
        </a>
        <div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/ventas/venta">Venta</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-cash-register"></i>
            <span>Ventas</span>
        </a>
        <div id="collapsesix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/ventas">Venta</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseseven"
                    aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-tools"></i>
            <span>Administracion</span>
        </a>
        <div id="collapseseven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones</h6>
                <a class="collapse-item" href="<?php echo base_url(); ?>/cajas">Cajas</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/configuracion">Configuracion</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/roles">Roles</a>
                <a class="collapse-item" href="<?php echo base_url(); ?>/usuarios">Usuarios</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
</ul>
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <div class="topbar-divider d-none d-sm-block">
                    </div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_session->nombre; ?></span>
                            <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>/img/undraw_profile.svg">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                            </a>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/cambio_password">
                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cambiar contraseña
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>/usuarios/logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>