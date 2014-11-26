<!DOCTYPE html>
<html>
  <head>
    <title>Iniciar sesion</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/estilo.css">
  </head>
  <body>
    <div id="principal">
      <header>
        <h1>Halcon</h1>
      </header>
       <div id="ingreso">
        <div id="img1">
          <img id="img" src="<?=base_url()?>assets/img/halcon.jpg">
        </div>
         <?php echo lang('login_subheading');?>
          <div id="infoMessage"><?php echo $message;?></div>
          <?php $class['class']='form col-md-12 center-block';?>
          <?=form_open("auth/login",$class);?>
             <table>
        <tr>
           <td>Usuario:</td>
           <td><input type="text" name="identity" required=""></td>
        </tr>
        <tr>
           <td>Contraseña:</td>
           <td><input type="password" name="password" required=""></td>
        </tr>
        <tr>
           <th colspan="2"><input type="submit" value="Entrar"></th>
        </tr>
             </table>
          </form>
      </div>
  </div>
  </body>
</html>
