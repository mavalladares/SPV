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
 

class Home extends CI_Controller {
     function __construct() {
        parent::__construct();
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('ion_auth');
        $this->load->model('codegen_model');

    }
    function index(){
        $r1 = $this->codegen_model->query('SELECT producto.id as id,count(venta_productos.id) as Total_de_ventas, sum(venta_productos.cantidad) as Cantidades_vendidas, producto.nombre as Producto_vendido FROM venta_productos  join producto on venta_productos.producto_id=producto.id group by venta_productos.producto_id','','');
        $results2= json_decode(json_encode($r1),true);

        $r1 = $this->codegen_model->query('SELECT producto.id as id ,producto.marca,producto.nombre,producto.precio_pza_venta as precio, sum(compra.cantidad) as Comprados,producto.descripcion FROM producto left join compra on producto.id=compra.producto_id group by producto.id','','');
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
        $this->data['resultado']=$results;
    	$this->load->view('frontend/home',$this->data);
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
    

}

/* End of file codegen.php */
/* Location: ./application/controllers/codegen.php */
