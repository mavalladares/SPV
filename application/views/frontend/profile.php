<?$this->load->view('frontend/header')?>

<div class="container">
      <div class="row clearfix">
            <div class="col-md-12 column">
                  <div class="panel panel-default">
                        <div class="panel-heading">
                              <h3 class="panel-title">
                                    Datos del adoptante
                              </h3>
                        </div>
                        <div class="panel-body">
                                    <p>Necesitamos algunos datos tuyos más para poder seguir con el procesos</p>

                                    <?php 
                                    echo form_open('adoptante/add',array('class'=>'form-horizontal')); ?>
                                    <?php //echo $custom_error;?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="calle">Calle<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="calle" type="text" name="calle" value="<?php echo set_value('calle'); ?>"  />
                                    <?php echo form_error('calle','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="colonia">Colonia<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="colonia" type="text" name="colonia" value="<?php echo set_value('colonia'); ?>"  />
                                    <?php echo form_error('colonia','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="numero">Número<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="numero" type="text" name="numero" value="<?php echo set_value('numero'); ?>"  />
                                    <?php echo form_error('numero','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="telefono">Teléfono<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="telefono" type="text" name="telefono" value="<?php echo set_value('telefono'); ?>"  />
                                    <?php echo form_error('telefono','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="facebook">Facebook</label>
                                    <div class="col-sm-10">  
                                    <input  class ="form-control" id="facebook" type="text" name="facebook" value="<?php echo set_value('facebook'); ?>"  />
                                    <?php echo form_error('facebook','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='users';
                                    $key='id';
                                    $value='id';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;
                                    if(!empty($enum)){
                                    $class="";
                                    $input = form_dropdown('users_id', array("" => "")+$enum,"default",'class="form-control" '); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <?php echo form_error('users_id','<div>','</div>'); ?>
                                    
                                    
<div class="col-md-12 ">
<div class="pull-right">
      <input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
                        </div>
                        <div class="panel-footer">
                              1/3
                        </div>
                  </div>
            </div>
      </div>
</div>
<?$this->load->view('frontend/footer')?>

