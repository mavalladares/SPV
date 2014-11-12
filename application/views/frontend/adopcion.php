<?$this->load->view('frontend/header')?>
<div class="container">
  <div class="row clearfix">
    <div class="col-md-12 column">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            Escoge la mascota que deseas adoptar
          </h3>
        </div>
        <div class="panel-body">
<h4>Tus Adopciones <small>Y sus estados</small></h4>
<div class="row">
<?
$adoptados = array();
foreach($results2 as $r):?>
<?
$adoptados[] = $r["id"];
$datetime1 = new DateTime(date('Y-m-d'));
$datetime2 = new DateTime($r["nacimiento"]);
$interval = $datetime1->diff($datetime2);
$edad = $interval->format('%y años %m meses y %d días');
if($r["estado"]=="aprobado"){
  $class="style='background:#B0FF8C;'";
}else{
  $class="";
}
?>
      <div class="col-md-3">
        <div class="thumbnail" <?=$class;?> >
          <div class="caption text-center">
            <h4><?=$r["nombre"];?></h4>
          </div>
          <img src="<?=$r["foto"]?>" style="height:150px;" class="img-responsive">
          <div class="caption">
            Estado : <?=$r["estado"];?>. <br>
            Sexo : <?=$r["sexo"];?>. <br>
            Talla : <?=$r["talla"];?>. <br>
            Edad : <?=$edad?>. <br>
            Descripcion : <?=$r["descripcion"]?>. <br>
          </div>
        </div>
      </div>
<?endforeach;?>
</div>
<hr>
<h3>Mascotas en adopcion
</h3>
<?echo form_open('Adopcion/add',array('class'=>'form-horizontal')); ?>
<div class="row galeria" >
<?foreach($results as $r):?>
<?
if(!in_array($r["id"],$adoptados)):
$datetime1 = new DateTime(date('Y-m-d'));
$datetime2 = new DateTime($r["nacimiento"]);
$interval = $datetime1->diff($datetime2);
$edad = $interval->format('%y años %m meses y %d días');
?>
      <div class="col-md-3">
        <div class="thumbnail prev">
          <div class="caption text-center">
            <h4><?=$r["nombre"];?></h4>
          </div>
          <img src="<?=$r["foto"]?>" style="height:150px;" class="img-responsive">
          <div class="caption">
            Sexo : <?=$r["sexo"];?>. <br>
            Talla : <?=$r["talla"];?>. <br>
            Edad : <?=$edad?>. <br>
            Descripcion : <?=$r["descripcion"]?>. <br>
          </div>
         <input type="radio" name="mascota_id" value="<?=$r["id"];?>" style="visibility:hidden;" requiered>
        </div>
      </div>
<?
endif;
endforeach;?>
<?if(sizeof($results)==0):?>
<div class="col-md-12">
<h3>No hay mascotas disponibles :C intenta más tarde</h3>
</div>
<?endif;?>
</div>
<input type="hidden" value="no aprobado" name="estado">
<input type="submit" value ="Adoptar" class="btn btn-primary">
</form>

        </div>
        <div class="panel-footer">
          3/3
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.prev').on('click',function(){
    console.log("ok");
    $(this).find('input').prop("checked", true);
    $('input[type=radio]').closest('.thumbnail').css('background','');
    if($('input[type=radio]').is(':checked')) {
      $(this).css('background','#c0c0c0');
    }
  });
</script>
<?$this->load->view('frontend/footer')?>