<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Impresion</title>
	<style>
	.table{
		width:100%;
	}
	.table tr td{
		border-bottom:1px #000 dashed;
	}
</style>
</head>
<body>
<?php
echo '<h1> productos</h1>';
if(!$results){
	echo '<h3>No hay datos :C</h3>';
	exit;
}
	$header = array_keys($results[0]);

for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]['Edit']     = '<div class="btn-group">'.anchor(base_url().'index.php/producto/edit/'.$id[0],'<span class="glyphicon glyphicon-pencil"></span>',
              array('class'=>'btn btn-warning')).anchor('#','<span class="glyphicon glyphicon-trash"></span>',array("id"=>$id[0],"class"=>"btn btn-danger toDelete","data-toggle"=>"modal","data-target"=>"#myModal")).'</div>';
            //$results[$i]['Delete']   =                                           

        }

$this->table->set_heading($header); 

// view
$tmpl = array ( 'table_open'  => '<table class="table">' );
$this->table->set_template($tmpl);
echo $this->table->generate($results); 
?>
</body>
</html>