<?$this->load->view('header')?>
<div class="row">
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-6 ">Folio de compra:</div>
			<div class="col-md-6"><?=$results2[0]["id"]?></div>
		</div>
		<div class="row">
			<div class="col-md-6">Fecha: </div>
			<div class="col-md-6"><?=$results2[0]["fecha"]?></div>
		</div>
		<div class="row">
			<div class="col-md-6">Realizo la venta: </div>
			<div class="col-md-6"><?=$results2[0]["Usuario"]?></div>
		</div>
	</div>
</div>
<?php
if(!$results){
	echo '<h3>No hay datos :C</h3>';
	exit;
}
	$header = array_keys($results[0]);

for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]['Edit']     = '';
            //$results[$i]['Delete']   =                                           

            array_shift($results[$i]);                        
        }

$clean_header = clean_header($header);
array_shift($clean_header);
$this->table->set_heading($clean_header); 
// view
$tmpl = array ( 'table_open'  => '<table class="table">' );
$this->table->set_template($tmpl);
echo $this->table->generate($results);
?>
<div class="col-md-4 col-md-offset-8">
<br>
<div class="row">
	<div class="col-md-6">Productos</div>
	<div class="col-md-6"><?=$results2[0]["Productos_Comprados"]?></div>
</div>
<div class="row">
	<div class="col-md-6">Total: $</div>
	<div class="col-md-6"><?=$results2[0]["Total"]?></div>
</div>
</div>
<div class="row">
	<div class="col-md-3">
		<a class="btn btn-success" href="<?=base_url()?>venta_productos/imprimir/<?=$results2[0]["id"]?>">Imprimir ticket</a>
	</div>
</div>
<?$this->load->view('footer')?>
</body>
</html>
