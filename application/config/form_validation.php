<?php

$config = array(
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
                                ),
                                array(
                                    'field'=>'proveedor_id',
                                    'label'=>'Proveedor',
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

				'venta' => array(
								array(
                                	'field'=>'ventacol',
                                	'label'=>'Tipo',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'sucursal' => array(array(
                                	'field'=>'nombre',
                                	'label'=>'Nombre',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'direccion',
                                	'label'=>'Direccion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'descripcion',
                                	'label'=>'Descripcion',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'proveedor' => array(array(
                                	'field'=>'nombre',
                                	'label'=>'Nombre',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'direccion',
                                	'label'=>'Direccion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefono',
                                	'label'=>'Telefono',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'correo',
                                	'label'=>'Correo',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'ruta' => array(array(
                                	'field'=>'numero_ruta',
                                	'label'=>'Numero de la ruta',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'direccion',
                                	'label'=>'Direccion',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'camioneta' => array(array(
                                	'field'=>'placas',
                                	'label'=>'Placas',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'modelo',
                                	'label'=>'Modelo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'ruta_id',
                                	'label'=>'Ruta',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'empleado' => array(array(
                                	'field'=>'nombre',
                                	'label'=>'Nombre',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'direccion',
                                	'label'=>'Direccion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'numero',
                                	'label'=>'Numero',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'cliente' => array(array(
                                	'field'=>'nombre',
                                	'label'=>'Nombre',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'direccion',
                                	'label'=>'Direccion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'telefono',
                                	'label'=>'Telefono',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'entregas' => array(array(
                                	'field'=>'empleado_id',
                                	'label'=>'Empleado',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'camioneta_id',
                                	'label'=>'Camioneta',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'venta_id',
                                	'label'=>'Venta',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'venta_credito' => array(array(
                                	'field'=>'venta_id',
                                	'label'=>'Venta',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cliente_id',
                                	'label'=>'Cliente',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'cpx' => array(array(
                                	'field'=>'pago',
                                	'label'=>'Pago',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'venta_credito_id',
                                	'label'=>'Folio venta a credito',
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
                                ),
								array(
                                	'field'=>'proveedor_id',
                                	'label'=>'Proveedor',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   );
			   
?>