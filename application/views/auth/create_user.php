<? $this->load->view('header');?>
  <div class="row clearfix">
    <div class="col-md-12 column">
      <?php echo form_open("auth/create_user");?>
      <div class="col-md-12">
      <h2 class="modal-title" id="myModalLabel"><?=lang('create_user_heading');?></h2>
      <h5><?=lang('create_user_subheading');?></h5>
      <div id="infoMessage">
      <?if($message!=""):?>
      <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Warning!</strong>
        <?=$message;?>
      </div>
      <?endif;?>
      </div></div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('create_user_fname_label', 'first_name');
            $first_name['class'] ='form-control'; 
            ?>
            </div>
            <div class="col-md-9">
            <?=form_input($first_name);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('create_user_lname_label', 'last_name');
            $last_name['class'] ='form-control'; 
            ?>
             </div>
            <div class="col-md-9">
            <?=form_input($last_name);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('create_user_email_label', 'email');
            $email['class'] ='form-control'; ?>
             </div>
            <div class="col-md-9">
            <?=form_input($email);?>
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
                                    $input = form_dropdown('company', array("" => "")+$enum,"default",'class="form-control" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
      <div class="form-group">
            <div class="col-md-2">
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
             </div>
            <div class="col-md-9">
            <input type="hidden" name="phone" value="00">
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('create_user_password_label', 'password');
            $password['class'] ='form-control'; ?>
             </div>
            <div class="col-md-9">
            <?=form_input($password);?>
            </div>
      </div>
      <div class="form-group">
            <div class="col-md-2">
            <?=lang('create_user_password_confirm_label', 'password_confirm');
            $password_confirm['class'] ='form-control'; ?>
             </div>
            <div class="col-md-9">
            <?=form_input($password_confirm);?>
            </div>
      </div>
      <div class="col-md-11">
        <input class = "btn btn-success pull-right" type="submit" name="mysubmit" value="<?=lang('create_user_submit_btn')?>" />
      </div>

      <?=form_close();?>
    </div>
  </div>
<? $this->load->view('footer');?>
