<?$this->load->view('frontend/header')?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Mascotas en adopcion
					</h3>
				</div>
				<div class="panel-body">
<div class="row galeria" >
<?
$aprobados=array();
foreach($results2 as $r1):
$aprobados[]=$r1["id"];
endforeach;?>
<?foreach($results1 as $r):?>
<?
if(!in_array($r["id"],$aprobados)):
$datetime1 = new DateTime(date('Y-m-d'));
$datetime2 = new DateTime($r["nacimiento"]);
$interval = $datetime1->diff($datetime2);
$edad = $interval->format('%y años %m meses y %d días');
?>
      <div class="col-md-3">
        <div class="thumbnail">
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
</div>
				</div>
				<div class="panel-footer">
					
				</div>
			</div>
		</div>
	</div>
</div>
<?$this->load->view('frontend/footer')?>
