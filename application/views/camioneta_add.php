<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Camioneta
            <small>Agregar camionetas</small>
            </h1>
      </section>
      <!-- Main content -->
      <section class="content">
           <?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="placas">Placas<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="placas" type="text" name="placas" value="<?php echo set_value('placas'); ?>"  />
                                    <?php echo form_error('placas','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="modelo">Modelo<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="modelo" type="text" name="modelo" value="<?php echo set_value('modelo'); ?>"  />
                                    <?php echo form_error('modelo','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?
                                    $table='ruta'; 
                                    if(!empty($ruta_id)){
                                    $class="";
                                    $input = form_dropdown('ruta_id', array("" => "")+$ruta_id,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="ruta_id">Ruta<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('ruta_id','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    
<div class="col-md-12 ">
<div class="pull-right">
    <input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
      </section><!-- /.content -->
</aside><!-- /.right-side -->



<?$this->load->view('footer')?>
