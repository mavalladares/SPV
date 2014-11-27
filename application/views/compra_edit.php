<?$this->load->view('header')?>
<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Compras
            <small>Editar compras</small>
            </h1>
      </section>
      <!-- Main content -->
      <section class="content">
            <?php
echo form_open(current_url(), array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="cantidad">Cantidad<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="cantidad" type="number" name="cantidad" value="<?php echo $result->cantidad ?>"  />
                                    <?php echo form_error('cantidad','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='producto';                                                    
                                    $input = form_dropdown('producto_id', $result->producto_id ,$result->producto_id,'class="form-control" required'); ?>
                                    <?php echo form_error('producto_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="producto_id">Producto<span class="required">*</span></label>
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

                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
      </section><!-- /.content -->
</aside><!-- /.right-side -->



<?$this->load->view('footer')?>

