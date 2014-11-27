<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Ventas
            <small>Lista de ventas</small>
            </h1>
      </section>
      <!-- Main content -->
      <section class="content">
           <a href="<?=base_url()?>/venta/imprimir" class="btn btn-success">Imprimir</a>
<?php
if(!$results){
  echo '<h3>No hay datos </h3>';
  exit;
}
  $header = array_keys($results[0]);

for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]['Edit']     = '<a class="btn btn-primary" href="'.base_url().'venta_productos/manage/'.$id[0].'" >ver detalles</a>';
            //$results[$i]['Delete']   =                                           
            
        }


$this->table->set_heading($header); 

// view
$tmpl = array ( 'table_open'  => '<table class="table">' );
$this->table->set_template($tmpl);
echo $this->table->generate($results); 
?>
<?=$this->pagination->create_links();?>

      </section><!-- /.content -->
</aside><!-- /.right-side -->


<script type="text/javascript">
$(document).ready(function(){
    $('.toDelete').click(function(){
        $('a.borrar').attr('href',"<?=base_url()?>index.php/venta/delete/"+$(this).attr('id'));
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