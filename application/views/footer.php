
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    
	<script type="text/javascript">
	$(document).ready(function(){
	    $('.toDelete').on('click',function(){
	        $('a.borrar').attr('href',"<?=base_url()?>index.php/sucursal/delete/"+$(this).attr('id'));
	    });
	});
	</script>
</body>

</html>
