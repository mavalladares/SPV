<?$this->load->view('header')?>
<?php
echo '<h1> Ventas de hoy</h1>';
if(!$results){
	echo '<h3>No hay datos </h3>';
	exit;
}
	$header = array_keys($results[0]);

for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]['Edit']     = '<a class="btn btn-primary" href="'.base_url().'venta_productos/manage/'.$id[0].'" >ver detalles</a>';
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
<?php
echo '<h1>Suma total de las ventas de hoy</h1>';
if(!$results2){
	echo '<h3>No hay datos </h3>';
	exit;
}
	$header2 = array_keys($results2[0]);


$this->table->set_heading($header2); 
$this->table->set_template($tmpl);
echo $this->table->generate($results2); 
?>
<?=$this->pagination->create_links();?>

<?$this->load->view('footer')?>
</body>
</html>