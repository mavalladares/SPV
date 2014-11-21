<?$this->load->view('header')?>
<script>
$(document).ready(function(){
    $('.productos').on('change',function(){
        var id = $( ".productos option:selected" ).attr('value');
        $.ajax({ 
        type: 'GET', 
        url: '<?=base_url()?>producto/find/'+id,  
        dataType: 'json',
        success: function(data) {
            for (var i=0, len=data.length; i < len; i++) {
              console.log(data[i].descripcion);
              $('.descripcion').empty();
              $('.existencia').text('0');
              $('.descripcion').text(data[i].descripcion);
              $('.existencia').text(data[i].Existencia);
            }
        }   
        });
    });
    var d = new Date();
    var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
    $('.fecha').text(strDate);
});
</script>
<?php 
echo form_open(current_url(),array('class'=>'form-horizontal')); ?>
<?php echo $custom_error; ?>

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
                                    $r1 = $this->codegen_model->query('SELECT MAX(id) as id FROM compra','','');
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

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="cantidad">Cantidad<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <input required class ="form-control" id="cantidad" type="number" name="cantidad" value="<?php echo set_value('cantidad'); ?>"  />
                                    <?php echo form_error('cantidad','<div>','</div>'); ?>
                                    </div>
                                    </div>
                                    

                                    <div class="clearfix"></div>
                                    <?php
                                    $table='producto';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $enum = $list;
                                    if(!empty($enum)){
                                    $class="";
                                    $input = form_dropdown('producto_id', array("" => "")+$enum,"default",'class="form-control productos" required'); 
                                    }else{
                                    $class = "has-error";
                                    $input = form_dropdown("error", array("0"=>"La tabla ".$table." debe tener almenos un registro"),"default", 'disabled="disabled" class="form-control"');
                                    }
                                    ?>
                                    <div class="form-group <?=$class?>">
                                    <label class="col-sm-2 control-label" for="producto_id">Producto<span class="required">*</span></label>
                                    <div class="col-sm-10">
                                      <div class="input-group">
                                      <?=$input;?>
                                      <span class="input-group-btn">
                                        <a class="btn btn-primary" href="<?=base_url().$table?>/add" target="_blank"  ><span class="glyphicon glyphicon-plus"></span></a>
                                      </span>
                                    </div><!-- /input-group -->
                                    </div>
                                    <hr>
                                    
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Descripcion">Descripción<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <div class="descripcion"></div>
                                    </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                    <label class="col-sm-2 control-label" for="Existencia">Existencia<span class="required">*</span></label>
                                    <div class="col-sm-10">  
                                    <div class="existencia"></div>
                                    </div>
                                    </div>
                                    
                                    
<div class="col-md-12 ">
<div class="pull-right">
    <input type="submit" class="btn btn-primary" value="Guardar">
</div>
</div>
<?php echo form_close(); ?>
<?$this->load->view('footer')?>
