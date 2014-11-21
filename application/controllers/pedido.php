<?php

class Pedido extends CI_Controller {
    
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

	function manage(){
		$this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/pedido/manage/';
        $config['total_rows'] = $this->codegen_model->count('pedido');
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

        $consulta= 'SELECT pedido.id,pedido.fecha,cliente.nombre FROM pedido join cliente on pedido.cliente_id=cliente.id '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('pedido_list', $this->data); 
        //$this->template->load('content', 'pedido_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	/*
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='cliente';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['cliente_id'] = $list;
        if ($this->form_validation->run('pedido') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cliente_id' => set_value('cliente_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('pedido',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/pedido/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('pedido_add', $this->data);   
        //$this->template->load('content', 'pedido_add', $this->data);
    }	
    */
    function add(){
        $this->checkLogin();        
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
            $table='cliente';
            $key='id';
            $value='nombre';
            $list = null;
            foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                $list[$row[$key]]=$row[$value];
            }
            $this->data['cliente_id'] = $list;
        if ($this->form_validation->run('pedido') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
           $data = array(
                    'cliente_id' => set_value('cliente_id')
            );
            if ($this->codegen_model->add('pedido',$data) == TRUE)
            {
                $id_venta = $this->db->insert_id();
                $productos = $this->input->post('producto');
                $cantidades = $this->input->post('cantidad');
                for($i=0;$i<sizeof($productos);$i++){
                    $data = array(
                        'pedido_id' =>$id_venta ,
                        'producto_id' => $productos[$i],
                        'cantidad'=> $cantidades[$i]
                        );
                $this->codegen_model->add('detalles_pedido',$data);
                }
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(base_url().'index.php/pedido/manage/');
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }
        }          
        $this->load->view('pedido_add', $this->data);   
        //$this->template->load('content', 'venta_add', $this->data);
    }   
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='cliente';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['cliente_id'] = $list;
        if ($this->form_validation->run('pedido') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cliente_id' => $this->input->post('cliente_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('pedido',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/pedido/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('pedido','id,cliente_id','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('pedido_edit', $this->data);		
        //$this->template->load('content', 'pedido_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('pedido','id',$ID);             
            redirect(base_url().'index.php/pedido/manage/');
    }
}

/* End of file pedido.php */
/* Location: ./system/application/controllers/pedido.php */