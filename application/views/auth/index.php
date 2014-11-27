<?$this->load->view('header');?>
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1 class="text-info">
		Usuarios
		<small>Lista de usuarios</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="btn-group">
		</div>
		<div class="btn-group">
		</div>
		<div id="infoMessage"><?php echo $message;?></div>
		<table cellpadding=0 cellspacing=10 class="table table-striped">
			<tr>
				<th><?php echo lang('index_fname_th');?></th>
				<th><?php echo lang('index_lname_th');?></th>
				<th><?php echo lang('index_email_th');?></th>
				<th><?php echo lang('index_groups_th');?></th>
				<th><?php echo lang('index_action_th');?></th>
			</tr>
			<?php foreach ($users as $user):?>
			<tr>
				<td><?php echo $user->first_name;?></td>
				<td><?php echo $user->last_name;?></td>
				<td><?php echo $user->email;?></td>
				<td>
					<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
					<?php endforeach?>
				</td>
				<td>
					<div class="btn-group">
						<?//=($user->active) ? anchor("auth/#",'<span class="glyphicon glyphicon-off" ></span>',array('class'=>'btn btn-primary des on','id'=>$user->id,"data-toggle"=>"modal","data-target"=>"#myModal")) : anchor("auth/activate/". $user->id,'<span class="glyphicon glyphicon-off" ></span>',array('class'=>'btn btn-default off'));?>
						<?=anchor("auth/delete/".$user->id,'<span class="glyphicon glyphicon-trash" ></span>',array('class'=>'btn btn-warning')) ;?>
						<?=anchor("auth/edit_user/".$user->id,'<span class="glyphicon glyphicon-pencil" ></span>',array('class'=>'btn btn-primary')) ;?>
					</div>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
		
		</section><!-- /.content -->
		</aside><!-- /.right-side -->
		
		<!-- Button trigger modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
				</div>
			</div>
		</div>
		<script>
		$(document).ready(function(){
			$('a.des').click(function(){
				$.ajax({
		url : "<?=base_url()?>/auth/deactivate/"+$(this).attr("id"),
		type: "get",
		success: function(data, textStatus, jqXHR)
		{
		$('.modal-content').html(data);
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
		
		}
		});
		});
		});
		</script>
		<?$this->load->view('footer');?>