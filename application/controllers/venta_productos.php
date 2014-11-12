<?php

class Venta_productos extends CI_Controller {
    
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
    }
	function index(){
		$this->manage();
	}

	function manage(){
		$this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        $id_venta =  $this->uri->segment(3);    
        //paging
        $config['base_url'] = base_url().'index.php/venta_productos/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta_productos');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $r1 = $this->codegen_model->query('SELECT venta_productos.id, producto.nombre as Producto, venta_productos.cantidad, producto.precio_pza_venta as Precio FROM venta join venta_productos on venta.id=venta_productos.venta_id  join producto on venta_productos.producto_id=producto.id where venta.id="'.$id_venta.'"','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
        $r1 = $this->codegen_model->query('SELECT users.first_name as Usuario, venta.id,sum(venta_productos.cantidad) as Productos_Comprados, SUM(producto.precio_pza_venta*venta_productos.cantidad) as Total, venta.fecha FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id join users on users.id=venta.users_id where venta.id="'.$id_venta.'" GROUP BY venta.id','','');
        $this->data['results2'] = json_decode(json_encode($r1),true);
        //$this->data['results'] = $this->codegen_model->get('venta_productos','id,venta_id,producto_id,cantidad','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('venta_productos_list', $this->data); 
       //$this->template->load('content', 'venta_productos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
    function imprimir(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        $id_venta =  $this->uri->segment(3);    
        //paging
        $config['base_url'] = base_url().'index.php/venta_productos/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta_productos');
        $config['per_page'] = 3;    
        $this->pagination->initialize($config);     
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $r1 = $this->codegen_model->query('SELECT venta_productos.id, producto.nombre as Producto, venta_productos.cantidad, producto.precio_pza_venta as Precio FROM venta join venta_productos on venta.id=venta_productos.venta_id  join producto on venta_productos.producto_id=producto.id where venta.id="'.$id_venta.'"','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
        $r1 = $this->codegen_model->query('SELECT users.first_name as Usuario, venta.id,sum(venta_productos.cantidad) as Productos_Comprados, SUM(producto.precio_pza_venta*venta_productos.cantidad) as Total, venta.fecha FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id join users on users.id=venta.users_id where venta.id="'.$id_venta.'" GROUP BY venta.id','','');
        $this->data['results2'] = json_decode(json_encode($r1),true);
        //$this->data['results'] = $this->codegen_model->get('venta_productos','id,venta_id,producto_id,cantidad','',$config['per_page'],$this->uri->segment(3));
        $this->load->helper(array(
            'dompdf',
            'file'
        ));
        $html = $this->load->view('venta_productos_list_imprimir', $this->data,true); 
        pdf_create($html,'Ticket');
       //$this->template->load('content', 'venta_productos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('venta_productos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'venta_id' => set_value('venta_id'),
					'producto_id' => set_value('producto_id'),
					'cantidad' => set_value('cantidad')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('venta_productos',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/venta_productos/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('venta_productos_add', $this->data);   
        //$this->template->load('content', 'venta_productos_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('venta_productos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'venta_id' => $this->input->post('venta_id'),
					'producto_id' => $this->input->post('producto_id'),
					'cantidad' => $this->input->post('cantidad')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('venta_productos',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/venta_productos/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('venta_productos','id,venta_id,producto_id,cantidad','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('venta_productos_edit', $this->data);		
        //$this->template->load('content', 'venta_productos_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('venta_productos','id',$ID);             
            redirect(base_url().'index.php/venta_productos/manage/');
    }
}

/* End of file venta_productos.php */
/* Location: ./system/application/controllers/venta_productos.php */