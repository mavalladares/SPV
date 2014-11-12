
<?php
$this->load->view('header');
echo '<h1> productos</h1>';
if(!$results){
      echo '<h3>No hay datos :C</h3>';
      exit;
}
$header = array_keys($results[0]);
$header[]="Vendidos";
$header[]="Existencia";
for($i=0;$i<count($results);$i++){
            $id = array_values($results[$i]);
            $results[$i]["Vendido"] = 0;
            $results[$i]["Existencia"] = $id[2];
            for($j=0;$j<count($results2);$j++){
                  $id_2 = array_values($results2[$j]);
                  if($id[0]==$id_2[0]){
                        $results[$i]["Vendido"] = $id_2[2];
                        $results[$i]["Existencia"] = $id[2]-$id_2[2];
                  }
            }
            //$results[$i]['Delete']   =                                           
                     
        }

$this->table->set_heading($header); 

// view
$tmpl = array ( 'table_open'  => '<table class="table">' );
$this->table->set_template($tmpl);
echo $this->table->generate($results); 
$this->load->view('footer');
?>