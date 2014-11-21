<?$this->load->view('header')?>

<?php
echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='empleado';                                                    
                                    $input = form_dropdown('empleado_id', $empleado_id,$result->empleado_id,'class="form-control" required'); ?>
                                    <?php echo form_error('empleado_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="empleado_id">Empleado<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('empleado_id','<div>','</div>'); ?>
                                    </div>
                                    </div>

                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='camioneta';                                                    
                                    $input = form_dropdown('camioneta_id', $camioneta_id,$result->camioneta_id,'class="form-control" required'); ?>
                                    <?php echo form_error('camioneta_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="camioneta_id">Camioneta<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('camioneta_id','<div>','</div>'); ?>
                                    </div>
                                    </div>

                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='venta';                                                    
                                    $input = form_dropdown('venta_id', $venta_id,$result->venta_id,'class="form-control" required'); ?>
                                    <?php echo form_error('venta_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="venta_id">Venta<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('venta_id','<div>','</div>'); ?>
                                    </div>
                                    </div>

                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
<?$this->load->view('footer')?>

