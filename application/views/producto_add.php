<?$this->load->view('header')?>

<?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="nombre">Nombre<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="nombre" type="text" name="nombre" value="<?php echo set_value('nombre'); ?>"  />
                                    <?php echo form_error('nombre','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="precio_pza_provedor">Precio provedor<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="precio_pza_provedor" type="number" name="precio_pza_provedor" value="<?php echo set_value('precio_pza_provedor'); ?>"  />
                                    <?php echo form_error('precio_pza_provedor','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="precio_pza_venta">Precio venta<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="precio_pza_venta" type="number" name="precio_pza_venta" value="<?php echo set_value('precio_pza_venta'); ?>"  />
                                    <?php echo form_error('precio_pza_venta','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="marca">Marca<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="marca" type="text" name="marca" value="<?php echo set_value('marca'); ?>"  />
                                    <?php echo form_error('marca','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="descripcion">Descripcion<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <textarea required class="form-control" id="descripcion" name="descripcion"><?php echo set_value('descripcion'); ?></textarea>
                                    <?php echo form_error('descripcion','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="existencia">Existencia<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="existencia" type="number" name="existencia" value="<?php echo set_value('existencia'); ?>"  />
                                    <?php echo form_error('existencia','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?
                                    $table='sucursal'; 
                                    if(!empty($sucursal_id)){
                                    $class="";
                                    $input = form_dropdown('sucursal_id', array("" => "")+$sucursal_id,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="sucursal_id">Sucursal<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('sucursal_id','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?
                                    $table='proveedor'; 
                                    if(!empty($proveedor_id)){
                                    $class="";
                                    $input = form_dropdown('proveedor_id', array("" => "")+$proveedor_id,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="proveedor_id">Proveedor<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('proveedor_id','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    
<div class="col-md-12 ">
<div class="pull-right">
	<input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
<?$this->load->view('footer')?>
