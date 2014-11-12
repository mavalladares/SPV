<?$this->load->view('header')?>
<script>
$(document).on('ready',function(){
var gal=0;
$('#venta').on('show.bs.modal', function (e) {
if(gal!=1){
  $.ajax({
   url:'<?=base_url()?>index.php/producto/lista',
   type:'GET',
   success: function(data){
       $('.resultado').html(data);
       console.log(gal)
       gal =1;
   }
  });
}
});
$('#venta').on('hidden.bs.modal', function (e) {
guardar();
});
$('#guarda').on('click',function(){
     guardar(); 
});
function guardar(){
  var total=0;
  var productos=0;
   $('.res').empty();
      $('.resultado').find('input[type=checkbox]:checked').each(function(){
        var clon = $(this).closest('tr').clone();
        //console.log(clon.html());
        clon.appendTo('.res');
        console.log(parseInt($(clon).find('input[type=number]').val()));
        total +=parseInt($(this).closest('tr').find('.precio').text())*parseInt($(clon).find('input[type=number]').val());
        productos +=parseInt($(clon).find('input[type=number]').val());
      });
      $('.totales').text(total);
      $('.productos').text(productos);
}
    var d = new Date();
    var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
    $('.fecha').text(strDate);
});
function ver(){
  console.log($('.res').html());
}


</script>

<?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Fecha">Fecha<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                    <div class="fecha"></div>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Folio">Folio de compra<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                    <?
                                    $r1 = $this->codegen_model->query('SELECT MAX(id) as id FROM venta','','');
                                    $results2= json_decode(json_encode($r1),true);
                                    echo $results2[0]['id']+101;
                                    ?>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="id_compra">Id compra<span class="required">*</span></label>
                                    <div class="col-sm-10"> 
                                    <?echo $results2[0]['id']+1?>
                                    </div>
                                    </div>
<a href="#" class="btn btn-default" data-target="#venta" id="gal"  data-toggle="modal">Agregar o editar productos</a>
<table class="table">
    <thead>
      <tr>
      <td>Id</td>
      <td>Producto</td>
      <td>Descripcion</td>
      <td>Precio</td>
      <td>Existencia</td>
      <td>Cantidad</td>
    </tr> 
    </thead>  
    <tbody class="res">
      
    </tbody>
    
</table>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Fecha">Cantidad Total de la venta: $<span class="required"></span></label>
                                    <div class="col-sm-10">
                                    <div class="totales"></div>
                                    </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Fecha">Cantidad Total de productos vendidos:<span class="required"></span></label>
                                    <div class="col-sm-10">
                                    <div class="productos"></div>
                                    </div>
                                    </div>


<?php echo form_error('users_id','<div>','</div>'); ?>
</div>
                                    
<div class="col-md-12 ">
<div class="pull-right">
	<input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
<?$this->load->view('footer')?>

<div class="modal fade" id="venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Productos</h4>
      </div>
      <div class="modal-body resultado">
       
      </div>
      <div class="modal-footer">
        <button type="button" id="guarda" data-dismiss="modal" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
