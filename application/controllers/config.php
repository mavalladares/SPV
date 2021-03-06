<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * CI Generator
 * http://projects.keithics.com/crud-generator-for-codeigniter/ 
 * Copyright (c) 2011 Keith Levi Lumanog
 * Dual MIT and GPL licenses.
 *
 * A CI generator to easily generates CRUD CODE, feel free to improve my code or customized it the way you like.
 * as inspired by Gii of Yii Framework. Last update August 15, 2011
 */
 

class Config extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
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
        $this->conf();
    }
    function prueba(){
        $this->load->view('plantilla');
    }
    public function conf(){
        $this->checkLogin();
        if(!isset($_POST['host'])){
        $json = json_decode(read_file('./application/config/config.json'));
        $data = $json->config;
        $this->load->view('config/config',$data);
        
        }else{
            $database = array('database' =>$this->input->post('database'),
                "host"=>$this->input->post('host'),
                "user"=>$this->input->post('user'),
                "password"=>$this->input->post('password')
                );
            $system = array('name' =>$this->input->post('name'),
                "administrator"=>$this->input->post('admin'),
                "title"=>$this->input->post('title'),
                "tags"=>$this->input->post('tags'),
                "description"=>$this->input->post('description')
                );

            $config = array("database"=>$database,"system"=>$system);
            $object = array("config"=>$config);
            $object = json_encode($object);
            if ( ! write_file('./application/config/config.json',$object))
            {
                 echo 'Unable to write the file';
            }
            else
            {
                 redirect('/');
            }
        }
    }
    

}

/* End of file codegen.php */
/* Location: ./application/controllers/codegen.php */
