<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Venta Crédito
            <small>Editar venta a crédito</small>
            </h1>
      </section>
      <!-- Main content -->
      <section class="content">
           <?php
echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

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

                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='cliente';                                                    
                                    $input = form_dropdown('cliente_id', $cliente_id,$result->cliente_id,'class="form-control" required'); ?>
                                    <?php echo form_error('cliente_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="cliente_id">Cliente<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('cliente_id','<div>','</div>'); ?>
                                    </div>
                                    </div>

                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
      </section><!-- /.content -->
</aside><!-- /.right-side -->


<?$this->load->view('footer')?>

