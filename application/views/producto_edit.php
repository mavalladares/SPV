<?$this->load->view('header')?>

<?php
echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="nombre">Nombre<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="nombre" type="text" name="nombre" value="<?php echo $result->nombre ?>"  />
                                    <?php echo form_error('nombre','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="precio_pza_provedor">Precio provedor<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="precio_pza_provedor" type="number" name="precio_pza_provedor" value="<?php echo $result->precio_pza_provedor ?>"  />
                                    <?php echo form_error('precio_pza_provedor','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="precio_pza_venta">Precio venta<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="precio_pza_venta" type="number" name="precio_pza_venta" value="<?php echo $result->precio_pza_venta ?>"  />
                                    <?php echo form_error('precio_pza_venta','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="marca">Marca<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="marca" type="text" name="marca" value="<?php echo $result->marca ?>"  />
                                    <?php echo form_error('marca','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="descripcion">Descripcion<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <textarea required class="form-control" id="descripcion" name="descripcion"><?php echo $result->descripcion ?></textarea>
                                    <?php echo form_error('descripcion','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                     <input required class ="form-control" id="existencia" type="hidden" name="existencia" value="0"  />



                                    <div class="clearfix"></div>
                                    <?php
                                    $table='sucursal';
                                    $key='id';
                                    $value='nombre';
                                    $list = array(""=>"");
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;                                                               
                                    $input = form_dropdown('sucursal_id', $enum,$result->sucursal_id,'class="form-control" required'); ?>
                                    <?php echo form_error('sucursal_id','<div>','</div>'); ?>
                                    <div class="form-group ">
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

                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
<?$this->load->view('footer')?>

