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
	body{
		width:500px;
	}
</style>
</head>
<body>
<table>
	<tr>
		<td>Folio de compra: </td>
		<td><?=$results2[0]["id"]?></td>
	</tr>
	<tr>
		<td>Fecha: </td>
		<td><?=$results2[0]["fecha"]?></td>
	</tr>
	<tr>
		<td>Venta realizada por: </td>
		<td><?=$results2[0]["Usuario"]?></td>
	</tr>
</table>
<h4>Ticket</h4>
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
<table>
	<tr>
		<td>Total de productos:</td>
		<td><?=$results2[0]["Productos_Comprados"]?></td>
	</tr>
	<tr>
		<td>Total: $</td>
		<td><?=$results2[0]["Total"]?></td>
	</tr>
</table>

</body>
</html>
