<?php

class Venta_credito extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
		$this->load->library('ion_auth');
    }   
    function checkLogin(){
        
    }
	function index(){
		$this->manage();
	}

	function manage(){
		$this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/venta_credito/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta_credito');
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

        $consulta= 'SELECT venta.id,venta.id as Folio_de_credito ,venta.fecha,venta_credito.id as Folio_de_venta ,cliente.nombre as Nombre_del_cliente FROM venta join venta_credito on venta.id=venta_credito.venta_id join cliente on venta_credito.cliente_id=cliente.id '.$limit;
        $this->data['results'] = $this->codegen_model->query($consulta);
	    $this->load->view('venta_credito_list', $this->data); 
        //$this->template->load('content', 'venta_credito_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }
	
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='venta';
                                    $key='id';
                                    $value='id';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['venta_id'] = $list; 
                                    $table='cliente';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['cliente_id'] = $list;
        if ($this->form_validation->run('venta_credito') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'venta_id' => set_value('venta_id'),
					'cliente_id' => set_value('cliente_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('venta_credito',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/venta_credito/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('venta_credito_add', $this->data);   
        //$this->template->load('content', 'venta_credito_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		 
                                    $table='venta';
                                    $key='id';
                                    $value='id';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['venta_id'] = $list; 
                                    $table='cliente';
                                    $key='id';
                                    $value='nombre';
                                    $list = null;
                                    foreach($this->codegen_model->get($table,$key.",".$value,"","","") as $row){
                                        $list[$row[$key]]=$row[$value];
                                    }
                                    $this->data['cliente_id'] = $list;
        if ($this->form_validation->run('venta_credito') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'venta_id' => $this->input->post('venta_id'),
					'cliente_id' => $this->input->post('cliente_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('venta_credito',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/venta_credito/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('venta_credito','id,venta_id,cliente_id','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('venta_credito_edit', $this->data);		
        //$this->template->load('content', 'venta_credito_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('venta_credito','id',$ID);             
            redirect(base_url().'index.php/venta_credito/manage/');
    }
}

/* End of file venta_credito.php */
/* Location: ./system/application/controllers/venta_credito.php */