<?php

class Sucursal extends CI_Controller {
    
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
        $config['base_url'] = base_url().'index.php/sucursal/manage/';
        $config['total_rows'] = $this->codegen_model->count('sucursal');
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

        $consulta= 'SELECT  id,nombre,direccion,descripcion FROM sucursal '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('sucursal_list', $this->data); 
        //$this->template->load('content', 'sucursal_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('sucursal') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => set_value('nombre'),
					'direccion' => set_value('direccion'),
					'descripcion' => set_value('descripcion')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('sucursal',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/sucursal/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('sucursal_add', $this->data);   
        //$this->template->load('content', 'sucursal_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('sucursal') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => $this->input->post('nombre'),
					'direccion' => $this->input->post('direccion'),
					'descripcion' => $this->input->post('descripcion')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('sucursal',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/sucursal/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('sucursal','id,nombre,direccion,descripcion','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('sucursal_edit', $this->data);		
        //$this->template->load('content', 'sucursal_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('sucursal','id',$ID);             
            redirect(base_url().'index.php/sucursal/manage/');
    }
}

/* End of file sucursal.php */
/* Location: ./system/application/controllers/sucursal.php */