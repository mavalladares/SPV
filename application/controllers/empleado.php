<?php

class Empleado extends CI_Controller {
    
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
        $config['base_url'] = base_url().'index.php/empleado/manage/';
        $config['total_rows'] = $this->codegen_model->count('empleado');
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

        $consulta= 'SELECT  id,nombre,direccion,numero FROM empleado '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('empleado_list', $this->data); 
        //$this->template->load('content', 'empleado_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('empleado') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => set_value('nombre'),
					'direccion' => set_value('direccion'),
					'numero' => set_value('numero')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('empleado',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/empleado/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('empleado_add', $this->data);   
        //$this->template->load('content', 'empleado_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('empleado') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => $this->input->post('nombre'),
					'direccion' => $this->input->post('direccion'),
					'numero' => $this->input->post('numero')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('empleado',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/empleado/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('empleado','id,nombre,direccion,numero','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('empleado_edit', $this->data);		
        //$this->template->load('content', 'empleado_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('empleado','id',$ID);             
            redirect(base_url().'index.php/empleado/manage/');
    }
}

/* End of file empleado.php */
/* Location: ./system/application/controllers/empleado.php */