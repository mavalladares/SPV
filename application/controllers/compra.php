<?php

class Compra extends CI_Controller {
    
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
        
        //paging
        $config['base_url'] = base_url().'index.php/compra/manage/';
        $config['total_rows'] = $this->codegen_model->count('compra');
        $config['per_page'] = 5;	
        $this->pagination->initialize($config); 	
        if($this->uri->segment(3)!=""){
            $var =$this->uri->segment(3);
        }else{
            $var=0;
        }
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		//$this->data['results'] = $this->codegen_model->get('compra','id,cantidad,producto_id','',$config['per_page'],$this->uri->segment(3));
        $r1 = $this->codegen_model->query('SELECT compra.id, compra.id+100 as folio, compra.cantidad, compra.fecha, producto.nombre,producto.descripcion, producto.precio_pza_provedor, producto.precio_pza_venta FROM compra join producto on compra.producto_id=producto.id LIMIT '.$var.','.$config['per_page'],'','');
        $this->data['results'] = json_decode(json_encode($r1),true);
        $this->data['url']='compra/imprimir/1';
	   $this->load->view('compra_list', $this->data); 
       //$this->template->load('content', 'compra_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	function today(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/compra/manage/';
        $config['total_rows'] = $this->codegen_model->count('compra');
        $config['per_page'] = 3000;    
        $this->pagination->initialize($config);
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('compra','id,cantidad,producto_id','',$config['per_page'],$this->uri->segment(3));
        $this->data['url']='compra/imprimir';
        $r1 = $this->codegen_model->query('SELECT compra.id, compra.id+100 as folio,compra.cantidad, compra.fecha, producto.nombre, producto.precio_pza_provedor, producto.precio_pza_venta FROM compra join producto on compra.producto_id=producto.id where DATE(compra.fecha) = CURDATE()','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
       $this->load->view('compra_list', $this->data); 
       //$this->template->load('content', 'compra_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function imprimir(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/compra/manage/';
        $config['total_rows'] = $this->codegen_model->count('compra');
        $config['per_page'] = 3000;    
        $this->pagination->initialize($config);
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('compra','id,cantidad,producto_id','',$config['per_page'],$this->uri->segment(3));
        $this->data['url']='compra/imprimir/2';
        if($this->uri->segment(3)=='1'){
        $r1 = $this->codegen_model->query('SELECT compra.id, compra.id+100 as folio, compra.cantidad, compra.fecha, producto.nombre,producto.descripcion, producto.precio_pza_provedor, producto.precio_pza_venta FROM compra join producto on compra.producto_id=producto.id ','','');
        
        }else{
        $r1 = $this->codegen_model->query('SELECT compra.id, compra.id+100 as folio, compra.cantidad, compra.fecha, producto.nombre,producto.descripcion, producto.precio_pza_provedor, producto.precio_pza_venta FROM compra join producto on compra.producto_id=producto.id  where DATE(compra.fecha) = CURDATE()','','');
        }
        $this->data['results'] = json_decode(json_encode($r1),true);
        $this->load->helper(array(
            'dompdf',
            'file'
        ));
        $html = $this->load->view('compra_list_imprimir', $this->data,true); 
        pdf_create($html,'Reporte-Compras');
       //$this->template->load('content', 'compra_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function add(){
    	$this->checkLogin();        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('compra') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cantidad' => set_value('cantidad'),
					'producto_id' => set_value('producto_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->add('compra',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/compra/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('compra_add', $this->data);   
        //$this->template->load('content', 'compra_add', $this->data);
    }	
    
    function edit(){  
    	$this->checkLogin();      
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('compra') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cantidad' => $this->input->post('cantidad'),
					'producto_id' => $this->input->post('producto_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
			if ($this->codegen_model->edit('compra',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/compra/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('compra','id,cantidad,producto_id','id = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('compra_edit', $this->data);		
        //$this->template->load('content', 'compra_edit', $this->data);
    }
	
    function delete(){
    		$this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('compra','id',$ID);             
            redirect(base_url().'index.php/compra/manage/');
    }
}

/* End of file compra.php */
/* Location: ./system/application/controllers/compra.php */