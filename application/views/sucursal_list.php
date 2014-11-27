<?$this->load->view('header')?>
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1 class="text-info">
    Sucursal
    <small>Lista de sucursales</small>
    </h1>
  </section>
  <!-- Main content -->
  <section class="content">
      <?php
      echo anchor(base_url().'index.php/sucursal/add/','<span class="glyphicon glyphicon-plus"></span> Agregar',array('class'=>'btn btn-primary'));   
      if(!$results){   
      exit;
      }
      echo "<br/><br/>";
      $header = array_keys($results[0]);
      for($i=0;$i<count($results);$i++){
      $id = array_values($results[$i]);
      $results[$i]['Edit']     = '<div class="btn-group">'.anchor(base_url().'index.php/sucursal/edit/'.$id[0],'<span class="glyphicon glyphicon-pencil"></span>',
      array('class'=>'btn btn-warning')).anchor('#','<span class="glyphicon glyphicon-trash"></span>',array("id"=>$id[0],"class"=>"btn btn-danger toDelete","data-toggle"=>"modal","data-target"=>"#myModal")).'</div>';
      //$results[$i]['Delete']   =
      array_shift($results[$i]);
      }
      $clean_header = clean_header($header);
      array_shift($clean_header);
      $this->table->set_heading($clean_header);
      $tmpl = array ( 'table_open'  => '<table class="table">' );
      $this->table->set_template($tmpl);
      echo $this->table->generate($results);
      ?>
      <?=$this->pagination->create_links();?>
      
        </section><!-- /.content -->
</aside>



<script type="text/javascript">
$(document).ready(function(){
$('.toDelete').click(function(){
$('a.borrar').attr('href',"<?=base_url()?>index.php/sucursal/delete/"+$(this).attr('id'));
});
});
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Alerta</h4>
      </div>
      <div class="modal-body">
        Seguro que desea continuar con la acción?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary borrar" href="#" >Si</a>
      </div>
    </div>
  </div>
</div>
<?$this->load->view('footer')?>