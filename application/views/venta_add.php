<?$this->load->view('header')?>
<aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1 class="text-info">
            Ventas
            <small>Agregar ventas</small>
            </h1>
      </section>
      <!-- Main content -->
      <section class="content">
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
                                     <?
                                    $table='cliente'; 
                                    if(!empty($cliente_id)){
                                    $class="";
                                    $input = form_dropdown('cliente_id', array("" => "")+$cliente_id,"default",'class="form-control" '); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>

                                    
                                    <select id="tipo" name="ventacol" id="" class="form-control" >
                                      <option value="venta">venta</option>
                                      <option value="pedido">pedido</option>
                                    </select>
                                    <div class="credito" style="visibility:hidden;">
                                      <select name="credito" id="" class="form-control" >
                                      <option value="1">Contado</option>
                                      <option value="2">Credito</option>
                                    </select>
                                    </div>
                                    <div class="cliente" style="visibility:hidden;">
                                      <div class="form-group <?=$class?>">
                                      <label class="col-sm-2 control-label" for="cliente_id">Cliente<span class=""></span></label>
                                      <div class="col-sm-10">
                                        <div class="input-group">
                                        <?=$input;?>
                                        <span class="input-group-btn">
                                          <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                        </span>
                                      </div><!-- /input-group -->
                                    </div>
                                    
                                    <?php echo form_error('cliente_id','<div>','</div>'); ?>
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
      </section><!-- /.content -->
</aside><!-- /.right-side -->

<script>
$(document).on('ready',function(){
      $('#tipo').change(function() {
        var tipo = $('#tipo option:selected').val();
        if(tipo=="venta"){
          $('.cliente').css("visibility","visible");
          $('.credito').css("visibility","visible");
        }else{
          $('.cliente').css("visibility",'hidden');
          $('.credito').css("visibility",'hidden');
          }
          console.log(tipo);
    });
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
