<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title><?=$this->config->item('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?=base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url()?>assets/css/calendar.css">
        <script src="<?=base_url();?>/assets/js/jquery.js"></script>
        <script src="<?=base_url();?>/assets/js/moment.js"></script>
        <script src="<?=base_url();?>/assets/js/bootstrap.js"></script>
        <script src="<?=base_url();?>/assets/js/bootstrap-datetimepicker.min.js"></script>
        <link href="<?=base_url();?>/assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="row clearfix">
      <div class="col-md-12 column">
        <nav class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> <a class="navbar-brand" href="<?=base_url()?>">CSA</a>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="">
                <a href="<?=base_url()?>/home/in_adopcion">EN ADOPCION</a>
              </li>
               <li>
                <a href="<?=base_url()?>/home/eventos">EVENTOS</a>
              </li>
              <li>
                <a href="<?=base_url()?>/home/about">NOSOTROS</a>
              </li>
              
            </ul>
             <?if (!$this->ion_auth->logged_in()):?>
              <?=form_open("auth/login",array('class'=>'navbar-form navbar-right'));?>
              <div class="form-group">
                <input name ="identity" type="text" class="form-control" placeholder="Login">
              </div>
              <div class="form-group">
                <input name = "password" type="password" class="form-control" placeholder="Password">
              </div>
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
              Recordar
              <button type="submit" class="btn btn-default">Ingresar</button>
              <a href="<?=base_url()?>/auth/create_user" class="btn btn-default">Registrate</a>
             </form>
             <?else:?>
             <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->ion_auth->user()->row()->first_name?> <?=$this->ion_auth->user()->row()->last_name?><strong class="caret"></strong></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="<?=base_url()?>auth">Mi perfil</a>
                    </li>
                    <li>
                      <a href="<?=base_url()?>auth/logout">Salir</a>
                    </li>
                  </ul>
                </li>
              </ul>
             <?endif;?>
          </div>

        </nav>
      </div>
    </div>
    <div class="row clearfix">