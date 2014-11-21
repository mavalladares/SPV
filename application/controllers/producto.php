<?php

class Producto extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
		$this->load->library('ion_auth');
    }   
    function checkLogin(){
        if (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) //remove this elseif if you want to enable this for non-admins
        {
            //redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
    }
	function index(){
		$this->manage();
	}
    function lista(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/producto/manage/';
        $config['total_rows'] = $this->codegen_model->count('producto');
        $config['per_page'] = 300;    
        $this->pagination->initialize($config);     
        if($this->uri->segment(3)==""){
            $var=0;
        }else{
            $var = $this->uri->segment(3);
        }
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('producto','id,nombre,precio_pza_provedor,precio_pza_venta,marca,descripcion,sucursal_id','',$config['per_page'],$this->uri->segment(3));
        $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id  group by venta_productos.producto_id','','');
        $this->data['results2']= json_decode(json_encode($r1),true);

        $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.nombre as Producto, sum(compra.cantidad) as Comprados,producto.precio_pza_venta as precio,producto.descripcion FROM producto join compra on producto.id=compra.producto_id  group by producto.id','','');
        $this->data['results'] = json_decode(json_encode($r1),true);

        $this->load->view('producto_list_carrito', $this->data); 
       //$this->template->load('content', 'producto_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function find(){
        $ID =  $this->uri->segment(3);

        $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id where producto.id='.$ID.' group by venta_productos.producto_id','','');
        $results2= json_decode(json_encode($r1),true);
        
        $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.nombre,producto.precio_pza_venta as precio, sum(compra.cantidad) as Comprados,producto.descripcion FROM producto left join compra on producto.id=compra.producto_id  where producto.id='.$ID.'  group by producto.id','','');
        $results = json_decode(json_encode($r1),true);

        $header = array_keys($results[0]);
        $header[]="Vendidos";
        $header[]="Existencia";
        for($i=0;$i<count($results);$i++){
                    $id = array_values($results[$i]);
                    for($j=0;$j<count($results2);$j++){
                          $id_2 = array_values($results2[$j]);
                          if($id[0]==$id_2[0]){
                                $results[$i]["Vendido"] = $id_2[2];
                                $results[$i]["Existencia"] = $id[3]-$id_2[2];
                          }
                    }
                    //$results[$i]['Delete']   =
                }
        echo json_encode($results);
        }
    function inventario(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/producto/manage/';
        $config['total_rows'] = $this->codegen_model->count('producto');
        $config['per_page'] = 300;    
        $this->pagination->initialize($config);     
        if($this->uri->segment(3)==""){
            $var=0;
        }else{
            $var = $this->uri->segment(3);
        }
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('producto','id,nombre,precio_pza_provedor,precio_pza_venta,marca,descripcion,sucursal_id','',$config['per_page'],$this->uri->segment(3));
        $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id  group by venta_productos.producto_id order by producto.nombre','','');
        $this->data['results2']= json_decode(json_encode($r1),true);

        $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.nombre as Producto, sum(compra.cantidad) as Comprados FROM producto join compra on producto.id=compra.producto_id  group by producto.id order by producto.nombre','','');
        $this->data['results'] = json_decode(json_encode($r1),true);

        $this->load->view('producto_list_inventario', $this->data); 
        //$this->template->load('content', 'producto_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function inventario_service(){
         $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id group by venta_productos.producto_id','','');
        $results2= json_decode(json_encode($r1),true);

        $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.nombre,producto.precio_pza_venta as precio, sum(compra.cantidad) as Comprados,producto.descripcion FROM producto left join compra on producto.id=compra.producto_id group by producto.id','','');
        $results = json_decode(json_encode($r1),true);

        $header = array_keys($results[0]);
        $header[]="Vendidos";
        $header[]="Existencia";
        for($i=0;$i<count($results);$i++){
                    $id = array_values($results[$i]);
                    for($j=0;$j<count($results2);$j++){
                          $id_2 = array_values($results2[$j]);
                          if($id[0]==$id_2[0]){
                                $results[$i]["Vendido"] = $id_2[2];
                                $results[$i]["Existencia"] = $id[3]-$id_2[2];
                          }
                    }
                    //$results[$i]['Delete']   =
                }
        echo json_encode($results);
       //$this->load->view('producto_list_inventario', $this->data); 
       //$this->template->load('content', 'producto_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function imprimir(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/producto/manage/';
        $config['total_rows'] = $this->codegen_model->count('producto');
        $config['per_page'] = 3;    
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $r1 = $this->codegen_model->query('SELECT producto.id,producto.id, producto.nombre as Producto, producto.precio_pza_provedor as Precio_provedor, producto.precio_pza_venta as Precio_venta, producto.marca, producto.descripcion FROM producto order by producto.nombre asc ','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
       $this->load->helper(array(
            'dompdf',
            'file'
        ));
        $html = $this->load->view('producto_list_imprimir', $this->data,true); 
        pdf_create($html,'Reporte-Productos');
       //$this->template->load('content', 'producto_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }

	function manage(){
		$this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/producto/manage/';
        $config['total_rows'] = $this->codegen_model->count('producto');
        $config['per_page'] = 10;
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		if($this->uri->segment(3)==""){
            $var=0;
        }else{
            $var = $this->uri->segment(3);
        }
        $limit = ' LIMIT '.$var.','.$config['per_page'];

        $consulta= 'SELECT  id,nombre,precio_pza_provedor,precio_pza_venta,marca,descripcion,existencia,sucursal_id,proveedor_id FROM producto '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('producto_list', $this->data); 
        //$this->template->load('content', 'producto_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='sucursal';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['sucursal_id'] = $list; 
                                    $table='proveedor';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['proveedor_id'] = $list;
        if ($this->form_validation->run('producto') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => set_value('nombre'),
					'precio_pza_provedor' => set_value('precio_pza_provedor'),
					'precio_pza_venta' => set_value('precio_pza_venta'),
					'marca' => set_value('marca'),
					'descripcion' => set_value('descripcion'),
					'existencia' => set_value('existencia'),
					'sucursal_id' => set_value('sucursal_id'),
					'proveedor_id' => set_value('proveedor_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('producto',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/producto/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('producto_add', $this->data);   
        //$this->template->load('content', 'producto_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='sucursal';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['sucursal_id'] = $list; 
                                    $table='proveedor';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['proveedor_id'] = $list;
        if ($this->form_validation->run('producto') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => $this->input->post('nombre'),
					'precio_pza_provedor' => $this->input->post('precio_pza_provedor'),
					'precio_pza_venta' => $this->input->post('precio_pza_venta'),
					'marca' => $this->input->post('marca'),
					'descripcion' => $this->input->post('descripcion'),
					'existencia' => $this->input->post('existencia'),
					'sucursal_id' => $this->input->post('sucursal_id'),
					'proveedor_id' => $this->input->post('proveedor_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('producto',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/producto/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('producto','id,nombre,precio_pza_provedor,precio_pza_venta,marca,descripcion,existencia,sucursal_id,proveedor_id','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('producto_edit', $this->data);		
        //$this->template->load('content', 'producto_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('producto','id',$ID);             
            redirect(base_url().'index.php/producto/manage/');
    }
}

/* End of file producto.php */
/* Location: ./system/application/controllers/producto.php */