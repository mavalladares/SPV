<?php

class Venta extends CI_Controller {
    
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
        //SELECT venta.id, venta.fecha, users.first_name FROM venta join users on venta.users_id=users.id
        $config['base_url'] = base_url().'index.php/venta/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta');
        $config['per_page'] = 60;    
        $this->pagination->initialize($config);     
        if($this->uri->segment(3)==""){
            $var=0;
        }else{
            $var=$this->uri->segment(3);
        }
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('venta','id,sucursal_id,users_id','',$config['per_page'],$this->uri->segment(3));
        $r1 = $this->codegen_model->query('SELECT venta.id,venta.id+100 as folio, sum(venta_productos.cantidad) as Productos_Vendidos,venta.fecha, SUM(producto.precio_pza_venta*venta_productos.cantidad) as $_Total, venta.fecha FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id GROUP BY venta.id order by venta.id desc LIMIT '.$var.','.$config['per_page'],'','');
        $this->data['results'] = json_decode(json_encode($r1),true);
       $this->load->view('venta_list', $this->data); 
       //$this->template->load('content', 'venta_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function imprimir(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        $r1 = $this->codegen_model->query('SELECT venta.id,venta.id+100 as folio, sum(venta_productos.cantidad) as Productos_Vendidos,venta.fecha, SUM(producto.precio_pza_venta*venta_productos.cantidad) as $_Total, venta.fecha FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id GROUP BY venta.id order by venta.id desc ','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
      
       $this->load->helper(array(
            'dompdf',
            'file'
        ));
        $html = $this->load->view('venta_list_imprimir', $this->data,true); 
        pdf_create($html,'Reporte-Ventas');
       //$this->template->load('content', 'venta_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function today(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        if($this->uri->segment(3)==""){
            $var=0;
        }else{
            $var=$this->uri->segment(3);
        }
        //paging
        //SELECT venta.id, venta.fecha, users.first_name FROM venta join users on venta.users_id=users.id
        $config['base_url'] = base_url().'index.php/venta/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta');
        $config['per_page'] = 6000;    
        $this->pagination->initialize($config);     
        
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('venta','id,sucursal_id,users_id','',$config['per_page'],$this->uri->segment(3));

       $r1 = $this->codegen_model->query('SELECT venta.id,venta.id+100 as folio, sum(venta_productos.cantidad) as Productos_Vendidos,venta.fecha, SUM(producto.precio_pza_venta*venta_productos.cantidad) as $_Total, venta.fecha FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id where DATE(venta.fecha) = CURDATE() GROUP BY venta.id order by venta.id desc LIMIT '.$var.','.$config['per_page'],'','');
       $this->data['results'] = json_decode(json_encode($r1),true);
       $this->load->view('venta_list', $this->data); 
       //$this->template->load('content', 'venta_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
     function sum_today(){
        $this->checkLogin();
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        //SELECT venta.id, venta.fecha, users.first_name FROM venta join users on venta.users_id=users.id
        $config['base_url'] = base_url().'index.php/venta/manage/';
        $config['total_rows'] = $this->codegen_model->count('venta');
        $config['per_page'] = 6000;    
        $this->pagination->initialize($config);     
        
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        //$this->data['results'] = $this->codegen_model->get('venta','id,sucursal_id,users_id','',$config['per_page'],$this->uri->segment(3));
        $r1 = $this->codegen_model->query('SELECT venta.id,sum(venta_productos.cantidad) as Productos_vendidos, SUM(producto.precio_pza_venta*venta_productos.cantidad) as $_Total FROM  venta join venta_productos on venta.id=venta_productos.venta_id join producto on venta_productos.producto_id=producto.id where DATE(venta.fecha) = CURDATE() ','','');
        $this->data['results'] = json_decode(json_encode($r1),true);
       $this->load->view('venta_list_sum_today', $this->data); 
       //$this->template->load('content', 'venta_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
        
    }
    function add(){
        $this->checkLogin();        
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        
        if ($this->form_validation->run('venta') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'users_id' => $this->ion_auth->user()->row()->id
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
            if ($this->codegen_model->add('venta',$data) == TRUE)
            {
                $id_venta = $this->db->insert_id();
                $productos = $this->input->post('producto');
                $cantidades = $this->input->post('cantidad');
                for($i=0;$i<sizeof($productos);$i++){
                    $data = array(
                        'venta_id' =>$id_venta ,
                        'producto_id' => $productos[$i],
                        'cantidad'=> $cantidades[$i]
                        );
                $this->codegen_model->add('venta_productos',$data);
                }
                //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                // or redirect
                redirect(base_url().'index.php/venta/manage/');
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

            }
        }          
        $this->load->view('venta_add', $this->data);   
        //$this->template->load('content', 'venta_add', $this->data);
    }   
    
    function edit(){  
        $this->checkLogin();      
        $this->load->library('form_validation');    
        $this->data['custom_error'] = '';
        
        if ($this->form_validation->run('venta') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'sucursal_id' => $this->input->post('sucursal_id'),
                    'users_id' => $this->input->post('users_id')
            );
           //add cause sometimes, when pass empty string I get troubles in the insert 
            foreach ($data as $i => $value) {
                if ($value === "") $data[$i] = null;
            }
            if ($this->codegen_model->edit('venta',$data,'id',$this->input->post('id')) == TRUE)
            {
                redirect(base_url().'index.php/venta/manage/');
            }
            else
            {
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

            }
        }

        $this->data['result'] = $this->codegen_model->get('venta','id,sucursal_id,users_id','id = '.$this->uri->segment(3),NULL,NULL,true);
        
        $this->load->view('venta_edit', $this->data);       
        //$this->template->load('content', 'venta_edit', $this->data);
    }
    
    function delete(){
            $this->checkLogin();
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('venta','id',$ID);             
            redirect(base_url().'index.php/venta/manage/');
    }
}

/* End of file venta.php */
/* Location: ./system/application/controllers/venta.php */