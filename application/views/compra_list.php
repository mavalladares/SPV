
<?$this->load->view('header')?>
<a href="<?=base_url()?><?=$url?>" class="btn btn-success">Imprimir</a>
<?php
echo '<h1> compra</h1>';
if(!$results){
	echo '<h3>No hay datos</h3>';
	exit;
}
	$header = array_keys($results[0]);

for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]['Edit']     = '<div class="btn-group">'.anchor(base_url().'index.php/compra/edit/'.$id[0],'<span class="glyphicon glyphicon-pencil"></span>',
              array('class'=>'btn btn-warning')).anchor('#','<span class="glyphicon glyphicon-trash"></span>',array("id"=>$id[0],"class"=>"btn btn-danger toDelete","data-toggle"=>"modal","data-target"=>"#myModal")).'</div>';
            //$results[$i]['Delete']   =                                           

        }

$this->table->set_heading($header); 

// view
$tmpl = array ( 'table_open'  => '<table class="table">' );
$this->table->set_template($tmpl);
echo $this->table->generate($results); 
?>
<?=$this->pagination->create_links();?>
<script type="text/javascript">
$(document).ready(function(){
    $('.toDelete').click(function(){
        $('a.borrar').attr('href',"<?=base_url()?>index.php/compra/delete/"+$(this).attr('id'));
    });
});
</script>
<?$this->load->view('footer')?>
</body>
</html>
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