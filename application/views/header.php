<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$this->config->item('title'); ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?=base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?=base_url();?>/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?=base_url();?>/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url();?>/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Halcón
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?=base_url();?>/assets/img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?=base_url();?>/assets/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?=base_url();?>/assets/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?=base_url();?>/assets/img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?=base_url();?>/assets/img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=base_url();?>/assets/img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?=base_url()?>auth" class="btn btn-default btn-flat"><i class="fa fa-fw fa-user"></i>Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=base_url()?>auth/logout" class="btn btn-default btn-flat"><i class="fa fa-fw fa-power-off"></i>Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        
                        <?if ($this->ion_auth->is_admin()) 
                          {
                        ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-map-marker"></i>
                                <span>Sucursales</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>sucursal/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>sucursal"><i class="fa fa-angle-double-right"></i> Ver lista</a></li>
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-users"></i>
                                <span>Usuarios</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>auth/create_user"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>auth"><i class="fa fa-angle-double-right"></i> Ver lista</a></li>
                                
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-book"></i>
                                <span>Productos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>producto/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>producto/inventario"><i class="fa fa-angle-double-right"></i> Inventario</a></li>
                                <li><a href="<?=base_url()?>producto"><i class="fa fa-angle-double-right"></i> Ver lista</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw  fa-thumb-tack"></i>
                                <span>Rutas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>ruta/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>ruta"><i class="fa fa-angle-double-right"></i> Ver Rutas</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw  fa-truck"></i> 
                                <span>Camionetas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>camioneta/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>camioneta"><i class="fa fa-angle-double-right"></i> Ver camionetas</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw  fa-user"></i> 
                                <span>Empleados</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>empleado/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>empleado"><i class="fa fa-angle-double-right"></i> Ver empleados</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw  fa-truck"></i>  
                                <span>Compras</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>compra/add"><i class="fa fa-angle-double-right"></i> Agregar</a></li>
                                <li><a href="<?=base_url()?>compra"><i class="fa fa-angle-double-right"></i> Ver Compras</a></li>
                                <li><a href="<?=base_url()?>compra/today"><i class="fa fa-angle-double-right"></i> Compras de hoy</a></li>
                                </ul>
                            </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-users"></i>  
                                <span>Clientes</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                                <li><a href="<?=base_url()?>cliente/manage"><i class="fa fa-angle-double-right"></i> Ver clientes</a></li>
                                <li><a href="<?=base_url()?>cliente/add"><i class="fa fa-angle-double-right"></i> Dar de alta</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-money"></i> 
                                <span>Ventas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                            <li><a href="<?=base_url()?>venta/add"><i class="fa fa-angle-double-right"></i> Hacer una venta o pedido</a></li>
                            <li><a href="<?=base_url()?>venta"><i class="fa fa-angle-double-right"></i> Ver ventas</a></li>
                            <li><a href="<?=base_url()?>venta/pedidos"><i class="fa fa-angle-double-right"></i> Ver pedidos</a></li>
                            <li><a href="<?=base_url()?>venta/sum_today"><i class="fa fa-angle-double-right"></i> Totales ventas de hoy</a></li>
                            <li><a href="<?=base_url()?>venta/sum_todayP"><i class="fa fa-angle-double-right"></i> Totales pedidos de hoy</a></li>
                            <li><a href="<?=base_url()?>venta/today"><i class="fa fa-angle-double-right"></i> Ver ventas de hoy</a></li>
                            <li><a href="<?=base_url()?>venta/todayP"><i class="fa fa-angle-double-right"></i> Ver pedidos de hoy</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-fw fa-map-marker"></i> 
                                <span>Créditos</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>

                            <ul class="treeview-menu">
                            <li><a href="<?=base_url()?>venta_credito"><i class="fa fa-angle-double-right"></i> Ver ventas a credito</a></li>
                            <li><a href="<?=base_url()?>cpx/add"><i class="fa fa-angle-double-right"></i> Hacer pago de credito</a></li>
                            <li><a href="<?=base_url()?>cpx"><i class="fa fa-angle-double-right"></i> Ver pagos de creditos</a></li>
                            </ul>
                        </li>
                        <?}?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>