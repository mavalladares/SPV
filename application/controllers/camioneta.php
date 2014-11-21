<?php

class Camioneta extends CI_Controller {
    
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
        $config['base_url'] = base_url().'index.php/camioneta/manage/';
        $config['total_rows'] = $this->codegen_model->count('camioneta');
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

        $consulta= 'SELECT  id,placas,modelo,ruta_id FROM camioneta '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('camioneta_list', $this->data); 
        //$this->template->load('content', 'camioneta_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='ruta';
                                    $key='id';
                                    $value='direccion';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['ruta_id'] = $list;
        if ($this->form_validation->run('camioneta') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'placas' => set_value('placas'),
					'modelo' => set_value('modelo'),
					'ruta_id' => set_value('ruta_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('camioneta',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/camioneta/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('camioneta_add', $this->data);   
        //$this->template->load('content', 'camioneta_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='ruta';
                                    $key='id';
                                    $value='direccion';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['ruta_id'] = $list;
        if ($this->form_validation->run('camioneta') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'placas' => $this->input->post('placas'),
					'modelo' => $this->input->post('modelo'),
					'ruta_id' => $this->input->post('ruta_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('camioneta',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/camioneta/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('camioneta','id,placas,modelo,ruta_id','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('camioneta_edit', $this->data);		
        //$this->template->load('content', 'camioneta_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('camioneta','id',$ID);             
            redirect(base_url().'index.php/camioneta/manage/');
    }
}

/* End of file camioneta.php */
/* Location: ./system/application/controllers/camioneta.php */