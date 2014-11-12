<?php

$config = array(
                
                'venta' => array(array(
                                    'field'=>'users_id',
                                    'label'=>'Users_id',
                                    'rules'=>'trim|xss_clean'
                                ))
               
               
                ,
                'sucursal' => array(array(
                                    'field'=>'nombre',
                                    'label'=>'Nombre',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'direccion',
                                    'label'=>'Dirección',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descripcion',
                                    'label'=>'Descripción',
                                    'rules'=>'required|trim|xss_clean'
                                ))
               
               
                ,

                'compra' => array(array(
                                    'field'=>'cantidad',
                                    'label'=>'Cantidad',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'producto_id',
                                    'label'=>'Producto',
                                    'rules'=>'required|trim|xss_clean'
                                ))
               
               
                ,

                'producto' => array(array(
                                    'field'=>'nombre',
                                    'label'=>'Nombre',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'precio_pza_provedor',
                                    'label'=>'Precio provedor',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'precio_pza_venta',
                                    'label'=>'Precio venta',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'marca',
                                    'label'=>'Marca',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'descripcion',
                                    'label'=>'Descripcion',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'existencia',
                                    'label'=>'Existencia',
                                    'rules'=>'required|trim|xss_clean'
                                ),
                                array(
                                    'field'=>'sucursal_id',
                                    'label'=>'Sucursal',
                                    'rules'=>'required|trim|xss_clean'
                                ))
               );
               
?>