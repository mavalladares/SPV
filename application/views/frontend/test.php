<?$this->load->view('frontend/header')?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Cuestionario 
					</h3>
				</div>
				<div class="panel-body">
				<p>Ahora solo necesitamos que descarges y subas este cuestionario contestado</p>
<a href="<?=base_url()?>assets/cuestionario.docx">Cuestioanrio.docx</a>
<?php   
$attributes = array('class' => 'form-horizontal', 'id' => '');
echo form_open_multipart('cuestionario/add', $attributes); ?>
<div class="control-group">
    <label for="archivo" class="control-label">Archivo</label>
	<div class='controls'>
        <input id="archivo" type="file" name="archivo" />
		<?php echo form_error('archivo'); ?>
	</div>
</div>
<input type="hidden" name="estado" value="no aprobado">
<div class="control-group">
	<label></label>
	<div class='controls'>
       	<input type="submit" value="cargar" class="btn btn-primary">
	</div>
</div>
<?php echo form_close(); ?></fieldset>
				</div>
				<div class="panel-footer">
					2/3
				</div>
			</div>
		</div>
	</div>
</div>