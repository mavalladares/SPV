<?$this->load->view('header')?>
<?php
echo '<h1>Suma total de los pedidos de hoy</h1>';
if(!$results){
	echo '<h3>No hay datos </h3>';
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
<?=$this->pagination->create_links();?>

<?$this->load->view('footer')?>
</body>
</html>