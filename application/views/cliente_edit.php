<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Cliente
            <small>Editar Cliente</small>
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
                                    <label class="col-sm-2 control-label"  for="nombre">Nombre<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="nombre" type="text" name="nombre" value="<?php echo $result->nombre ?>"  />
                                    <?php echo form_error('nombre','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="direccion">Direccion<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="direccion" type="text" name="direccion" value="<?php echo $result->direccion ?>"  />
                                    <?php echo form_error('direccion','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label"  for="telefono">Telefono<span class="required">*</span></label>
                                    <div class="col-sm-10">                                
                                    <input required class ="form-control" id="telefono" type="text" name="telefono" value="<?php echo $result->telefono ?>"  />
                                    <?php echo form_error('telefono','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
      </section><!-- /.content -->
</aside><!-- /.right-side -->


<?$this->load->view('footer')?>

