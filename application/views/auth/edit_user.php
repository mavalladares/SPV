<?$this->load->view('header');?>

      <?=form_open(uri_string());?>
      <h2 class="modal-title" id="myModalLabel"><?=lang('edit_user_heading');?></h2>
      
      <h5><?=lang('edit_user_subheading');?></h5>
      <div id="infoMessage"><?=$message;?></div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('edit_user_fname_label', 'first_name');
            $first_name['class'] ='form-control'; 
            ?>
            </div>
            <div class="col-md-9 col-md-offset-1">
            <?=form_input($first_name);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('edit_user_lname_label', 'last_name');
            $last_name['class'] ='form-control'; 
            ?>
             </div>
            <div class="col-md-9 col-md-offset-1">
            <?=form_input($last_name);?>
            </div>
      </div>
      <?php
                                    $table='sucursal';
                                    $key='nombre';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;
                                    if(!empty($enum)){
                                    $class="";
                                    $input = form_dropdown('company', array("" => "")+$enum,"Halcon 1",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
      <div class="form-group">
            <div class="col-md-3">
            <label for="Sucursal">Sucursal*</label>
            <?//=lang('create_user_company_label', 'company');
            $company['class'] ='form-control'; 
            ?>
             </div>
            <div class="col-md-9">
            <?=$input?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?lang('edit_user_phone_label', 'phone');
            $phone['class'] ='form-control'; 
            ?>
             </div>
            <div class="col-md-9 col-md-offset-1">
            <input type="hidden" name="phone" value="000">
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('edit_user_password_label', 'password');
            $password['class'] ='form-control'; ?>
             </div>
            <div class="col-md-9 col-md-offset-1">
            <?=form_input($password);?>
            </div>
      </div>
      <div class="clearfix"></div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('edit_user_password_confirm_label', 'password_confirm');
            $password_confirm['class'] ='form-control'; ?>
             </div>
            <div class="col-md-9 col-md-offset-1">
            <?=form_input($password_confirm);?>
            </div>
      </div>
      <div class="clearfix"></div>

      <?php if ($this->ion_auth->is_admin()): ?>
      <div class="form-group">
          <div class="col-md-2">
          <h4><?=lang('edit_user_groups_heading');?></h4>
          </div>
          <div class="col-md-9 col-md-offset-1">
          <div class="btn-group" data-toggle="buttons">
          <?php foreach ($groups as $group):?>
              
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $active = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                          $active='active';
                      break;
                      }
                  }
              ?>
              <label class="btn btn-primary <?=$active?>">
              <input type="checkbox" name="groups[]" value="<?=$group['id'];?>"<?=$checked;?>>
              <?=$group['name'];?>
              </label>
          <?php endforeach?>
          </div>
      <?php endif ?>

      <?=form_hidden('id', $user->id);?>
      <?=form_hidden($csrf); ?>
      <div class="clearfix"></div>
        <input class = "btn btn-success pull-right" type="submit" name="mysubmit" value="<?=lang('edit_user_submit_btn')?>" />

      <?=form_close();?>
<?$this->load->view('footer');?>