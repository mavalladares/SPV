<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title><?=$this->config->item('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?=base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/css/sb-admin.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
              <!-- jQuery Version 1.11.0 -->
        <script src="<?=base_url();?>/assets/js/jquery-1.11.0.js"></script>
        <script src="<?=base_url();?>/assets/js/bootstrap.js"></script>
</head>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?=$this->config->item('name');?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                     <?
                 $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id group by venta_productos.producto_id','','');
                  $results2= json_decode(json_encode($r1),true);

                  $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.nombre,producto.precio_pza_venta as precio, sum(compra.cantidad) as Comprados,producto.descripcion FROM producto left join compra on producto.id=compra.producto_id group by producto.id','','');
                  $results = json_decode(json_encode($r1),true);

                  $header = array_keys($results[0]);
                  $header[]="Vendidos";
                  $header[]="Existencia";
                  for($i=0;$i<count($results);$i++){
                              $id = array_values($results[$i]);
                              $results[$i]["Vendido"] = 0;
                              $results[$i]["Existencia"] = $id[2];
                              for($j=0;$j<count($results2);$j++){
                                    $id_2 = array_values($results2[$j]);
                                    if($id[0]==$id_2[0]){
                                          $results[$i]["Vendido"] = $id_2[2];
                                          $results[$i]["Existencia"] = $id[3]-$id_2[2];
                                    }
                              }
                              //$results[$i]['Delete']   =
                          }
                  foreach($results as $result):
                    if($result["Existencia"]<10):
                  ?>
                        <li>
                            <a href="#"><?=$result["nombre"]?><span class="label label-warning"><?=$result["Existencia"]?></span></a>
                        </li>
                  <?
                    endif;
                    endforeach;?>
                       
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?=base_url()?>auth"><i class="fa fa-fw fa-user"></i> Mi perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?=base_url()?>auth/logout"><i class="fa fa-fw fa-power-off"></i>Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="overflow-y: scroll; height:600px;">
                    <?if ($this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
                      {
                    ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-map-marker"></i> Sucursales <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                              <a href="<?=base_url()?>sucursal/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>sucursal">Ver lista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-users"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                              <a href="<?=base_url()?>auth/create_user">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>auth">Ver lista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-book"></i> Productos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                              <a href="<?=base_url()?>producto/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>producto/inventario">Inventario</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>producto">Ver lista</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw  fa-thumb-tack"></i> Rutas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                              <a href="<?=base_url()?>ruta/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>ruta">Ver Rutas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw  fa-truck"></i> Camionetas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
                              <a href="<?=base_url()?>camioneta/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>camioneta">Ver camionetas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa fa-fw  fa-user"></i> Empleado <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo6" class="collapse">
                            <li>
                              <a href="<?=base_url()?>empleado/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>empleado">Ver empleados</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo7"><i class="fa fa-fw  fa-truck"></i> Compras <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo7" class="collapse">
                            <li>
                              <a href="<?=base_url()?>compra/add">Agregar</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>compra">Ver Compras</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>compra/today">Compras de hoy</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo24"><i class="fa fa-fw fa-users"></i> Clientes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo24" class="collapse">
                            <li>
                              <a href="<?=base_url()?>cliente/manage">Ver clientes</a>
                            </li>
                             <li>
                              <a href="<?=base_url()?>cliente/add">Dar de alta</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo25"><i class="fa fa-fw fa-money"></i> Ventas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo25" class="collapse">
                             <li>
                              <a href="<?=base_url()?>venta/add">Hacer una venta o pedido</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta">Ver ventas</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/pedidos">Ver pedidos</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/sum_today">Totales ventas de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/sum_todayP">Totales pedidos de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/today">Ver ventas de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/todayP">Ver pedidos de hoy</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo30"><i class="fa fa-fw fa-map-marker"></i> Creditos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo30" class="collapse">

                            <li>
                              <a href="<?=base_url()?>venta_credito">Ver ventas a credito</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>cpx/add">Hacer pago de credito</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>cpx">Ver pagos de creditos</a>
                            </li>
                        </ul>
                    </li>
                    <?}else{?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo24"><i class="fa fa-fw fa-users"></i> Clientes <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo24" class="collapse">
                            <li>
                              <a href="<?=base_url()?>cliente/manage">Ver clientes</a>
                            </li>
                             <li>
                              <a href="<?=base_url()?>cliente/add">Dar de alta</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo25"><i class="fa fa-fw fa-money"></i> Ventas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo25" class="collapse">
                             <li>
                              <a href="<?=base_url()?>venta/add">Hacer una venta o pedido</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta">Ver ventas</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/pedidos">Ver pedidos</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/sum_today">Totales ventas de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/sum_todayP">Totales pedidos de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/today">Ver ventas de hoy</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>venta/todayP">Ver pedidos de hoy</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo30"><i class="fa fa-fw fa-map-marker"></i> Creditos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo30" class="collapse">

                            <li>
                              <a href="<?=base_url()?>venta_credito">Ver ventas a credito</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>cpx/add">Hacer pago de credito</a>
                            </li>
                            <li>
                              <a href="<?=base_url()?>cpx">Ver pagos de creditos</a>
                            </li>
                        </ul>
                    </li>
                    <?}?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid" style="min-height:600px;">