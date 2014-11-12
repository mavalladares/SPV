<?$this->load->view('header')?>

<?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='venta';
                                    $key='id';
                                    $value='id';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;
                                    if(!empty($enum)){
                                    $class="";
                                    $input = form_dropdown('venta_id', array("" => "")+$enum,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="venta_id">Venta_id<span class="required">*</span></label>
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
                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='producto';
                                    $key='id';
                                    $value='id';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;
                                    if(!empty($enum)){
                                    $class="";
                                    $input = form_dropdown('producto_id', array("" => "")+$enum,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="producto_id">Producto_id<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('producto_id','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="cantidad">Cantidad<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="cantidad" type="number" name="cantidad" value="<?php echo set_value('cantidad'); ?>"  />
                                    <?php echo form_error('cantidad','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    
<div class="col-md-12 ">
<div class="pull-right">
	<input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
<?$this->load->view('footer')?>
