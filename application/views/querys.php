<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title><?=$this->config->item('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="<?=base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?=base_url();?>/assets/css/sb-admin.css" rel="stylesheet">
        <link href="<?=base_url();?>assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
              <!-- jQuery Version 1.11.0 -->
        <script src="<?=base_url();?>/assets/js/jquery-1.11.0.js"></script>
        <script src="<?=base_url();?>/assets/js/bootstrap.js"></script>
</head>
<body>
  <script>
  function limpiarC(){
  
    $.ajax({
                url:'<?=base_url()?>index.php/codegen/limpiar/',
                type:'POST',
                dataType: 'html',
                data: {consulta: $('.consulta').text()},
                success: function( json ) {
                    console.log(json);
                    $('.salida').val(json);
                }
            });
  }
  function CloseMySelf(sender) {
      try {
          window.opener.HandlePopupResult($('.consulta').text());
      }
      catch (err) {}
      window.close();
      return false;
  }
    $(document).ready(function(){
      var tables =2;
      var k =0;
        $(document).on('change','.tables', function(){ 
            var node = $(this);
            var num_tabla = $(this).parent().parent().attr('id');
            var tabla = $(node).find(":selected").text();
            $('.joins').find('#'+num_tabla).find('.text').text('join '+tabla+' on ');
             $.ajax({
                url:'<?=base_url()?>index.php/codegen/getFields/'+tabla,
                type:'POST',
                dataType: 'json',
                success: function( json ) {
                    console.log(json);
                    $('.first_table').empty().append($('.container #1').find(":selected").text());
                    var fields = $(node).parent().parent().find('.fields');
                    $(fields).empty();
                    $.each(json, function(i, value) {
                        var field = $('.plantilla').children().clone();
                        $(field).find('input').attr('id',value);
                        $(field).find('input[type=radio]:first').attr({'value':tabla+"."+value,'id':num_tabla,'name':num_tabla+'-A'});
                        $(field).find('input[type=radio]:last').attr({'value':tabla+"."+value,'id':1+Number(num_tabla),'name':num_tabla+'-B'});
                        $(field).find('input[type=checkbox]').attr({'onclick':'checbox()','class':tabla,'value':value});
                        $(field).find('input[type=radio]').attr('onclick','radio()');
                        $(field).find('input[type=text]').attr('placeholder',value);
                        $(fields).append(field);
                        if(num_tabla>1){
                          $('.input-group-addon').find('#'+num_tabla).prop('disabled',false);
                          $(field).find('input[type=radio]:first').prop('disabled', false);
                          $(field).find('input[type=radio]:last').prop('disabled', true);
                        }
                        k++;
                    });
                }
            });
             console.log(num_tabla);
             cargar();
        });
        
        $(document).on('click','#clonar', function(){ 
            var nuevo = $( "#1" ).clone().attr('id',tables);
            $(nuevo).find('.fields').empty();
            $('#contenedor').append(nuevo);
            $('#query').append($('<div><div/>').attr('id',tables).html(tables));
            if(tables>=2){
              $( ".joins" ).append($('<div/>').attr({'id':tables,'class':'join'}));
              $( ".joins ").find('#'+tables).append($('<div/>').attr({'class':'text'}).text('join table on '));
              $( ".joins ").find('#'+tables).append($('<div/>').attr({'class':'on'}).text('id=id'));
            }
            tables++;
            cargar();
        });
        $(document).on('change','#select_all',function() {
            var checkboxes = $(this).closest('.col-md-3').find(':checkbox');
            if($(this).is(':checked')) {
                checkboxes.prop('checked',true);
            } else {
                checkboxes.prop('checked',false);
            }
            checbox();
        });
        $(document).on('change','input[type=text]',function() {
          var id = $(this).attr('id');
          var tabla = $(this).closest('.col-md-3').attr('id');
          var texto = $(this).attr('value');
          $('#'+id+' .'+tabla).attr('value',texto);
        });
    });
    function checbox(){
            $('.campos').empty();
            var i = 0;
            $(".fields input[type=checkbox]:checked").each(function(){
            var tabla = $(this).closest(".col-md-3").find(":selected");
            console.log(tabla.html());
            $('.campos').append(tabla.text()+"."+$(this).attr('value'));
            if(i<$(".fields input[type=checkbox]:checked").length-1){
              $('.campos').append(',<br>');
            }
            i++;
            });
            cargar();
      }
      function radio(){
        var f = 1;
        var anterior = "";
        var izquierda = Array();
        var derecha = Array();
        console.log("hola");
        $(".r input[type=radio]:checked").each(function(){
          console.log($(this).attr("value"));
          derecha.push($(this).attr("value"));
        });
        $(".l input[type=radio]:checked").each(function(){
          console.log($(this).attr("value"));
          izquierda.push($(this).attr("value"));
        });
        
          for(var i = 0 ; i < izquierda.length ; i++){
            $('.joins').find('#'+(i+2)).find('.on').text(derecha[i]+"="+izquierda[i]);
            console.log(i+"-"+"d"+derecha[i]+"="+izquierda[i]+"i");
          }
        }
      function cargar(){
        //$('.consult').html($('.consulta').text().replace(/(\s+)/g,' '));
      }
</script>
<div class="container">
<div class="col-md-12">
      <a href="#" id="clonar" class="btn btn-primary">Agregar tabla</a>
      <a href="#" result="allow" onclick="return CloseMySelf(this);" class="btn btn-warning">Aceptar</a>
      <a href="#" onclick="limpiarC()" class="btn btn-success">Limpiar</a>
      
</div>
<div class="col-md-12">
    <div id="contenedor">
          <div class="col-md-3" id="1">
            <div class="input-group input-group-sm">
              <span class="input-group-addon" style="font-size:10px;">
                FK
              </span>
              <span class="input-group-addon">
                <input type="checkbox"  id="select_all">
              </span>
                  <?php
                  $db_tables = $this->db->list_tables();
                  echo form_dropdown('table',$db_tables,'default','class="form-control tables"');
                  ?>
              <span class="input-group-addon" style="font-size:10px;">
                FK  
              </span>
            </div>
            <div class="fields">
                        
            </div>
          </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-12">
  <code>
    <div class="consulta" >
        <div class="select">
              SELECT 
        </div>
        <div class="campos">
              *
        </div>
        <div class="from">
              FROM 
        </div>
        <div class="first_table">
              tabla 
        </div>
        <div class="joins">
        </div>
  </div>
  </code>
  <br>
      <textarea name="" class="salida" id="" cols="300" rows="5"></textarea>
</div>

</div>

<div class="plantilla" style="visibility:hidden">
   <div class="input-group input-group-sm">
      <span class="input-group-addon l" >
        <input type="radio" disabled>
      </span>
      <span class="input-group-addon">
        <input type="checkbox">
      </span>
      <input type="text" class="form-control">
      <span class="input-group-addon r">
        <input type="radio">
      </span>
    </div>
</div>

</body>
</html>