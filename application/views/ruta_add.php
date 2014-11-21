<?$this->load->view('header')?>

<?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="numero_ruta">Numero de la ruta<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="numero_ruta" type="text" name="numero_ruta" value="<?php echo set_value('numero_ruta'); ?>"  />
                                    <?php echo form_error('numero_ruta','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="direccion">Direccion<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <textarea required class="form-control" id="direccion" name="direccion"><?php echo set_value('direccion'); ?></textarea>
                                    <?php echo form_error('direccion','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    
<div class="col-md-12 ">
<div class="pull-right">
	<input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
<?$this->load->view('footer')?>
