<?$this->load->view('header')?>

<?php
echo form_open(current_url()); ?>
<?php echo $custom_error; ?>
<?php echo form_hidden('id',$result->id) ?>

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='users';
                                    $key='id';
                                    $value='id';
                                    $list = array(""=>"");
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;                                                               
                                    $input = form_dropdown('users_id', $enum,$result->users_id,'class="form-control" required'); ?>
                                    <?php echo form_error('users_id','<div>','</div>'); ?>
                                    <div class="form-group ">
                                    <label class="col-sm-2 control-label" for="users_id">Users_id<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    
                                    <?php echo form_error('users_id','<div>','</div>'); ?>
                                    </div>
                                    </div>

                                    
<p class="pull-right">
        <input class="btn btn-primary" type="submit" value="Guardar">
</p>

<?php echo form_close(); ?>
<?$this->load->view('footer')?>

