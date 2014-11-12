<?
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
?>

Filtrar busqueda:
<input type="text" id="search" class="form-control" placeholder="Buscar" />


<div id="resultado">
<table class="table list">
<?foreach($results as $res):?>
<?if($res['Existencia']>0):?>
<tr>
<td><?=$res['id']?></td>
<td><?=$res['Producto']?></td>
<td><?=$res['descripcion']?></td>
<td><div style="float:left">$</div><div class="precio" style="float:left"><?=$res['precio']?></div></td>
<td class="existencia"><?=$res['Existencia']?></td>
<td >
	<input type="number" min="1" max="<?=$res['Existencia']?>" class="cantidad"  name ="cantidad[]" value="1" >
	<input type="checkbox" name="producto[]" value="<?=$res['id']?>">
</td>
</tr>
<?endif;?>
<?endforeach;?>
</table>
</div>
<script>
$(document).ready(function(){

 $("#search").keyup(function(){
 var val = $(this).val().toLowerCase();
 $(".list tr").hide();
 $(".list tr").each(function(){
 var text = $(this).text().toLowerCase();
 if(text.indexOf(val) != -1)
 {
 $(this).show();
 }
 });
 });
});
</script>