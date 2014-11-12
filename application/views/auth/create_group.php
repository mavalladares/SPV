<?$this->load->view('header');?>
      <h1><?=lang('create_group_heading');?></h1>
		<p><?=lang('create_group_subheading');?></p>

		<div id="infoMessage"><?=$message;?></div>

		<?=form_open("auth/create_group");?>

      <p>
            <?=lang('create_group_name_label', 'group_name');
            $group_name['class'] ='form-control';?>
            <?=form_input($group_name);?>
      </p>

      <p>
            <?=lang('create_group_desc_label', 'description');
            $description['class'] ='form-control';?>
            <?=form_textarea($description);?>
      </p>
	<input class="btn btn-success"type="submit" value="<?=lang('create_group_submit_btn')?>">

<?=form_close();?>
<?$this->load->view('footer');?>