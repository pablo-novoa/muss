<?php

//define prefix
define('PREFIX', '_muss_');

// page settings box
add_action( 'cmb2_admin_init', 'muss_page_options' );


function muss_page_options(){

	$muss_pageOptions = new_cmb2_box( array(
		'id'            => PREFIX . 'pageTopBanner',
		'title'         => __( 'Configuración de página ', 'cmb2' ),
		'object_types'  => array('page', 'post'),
		'closed'     => true
	) );

	$muss_pageOptions->add_field( array(
		'name'       => __( 'Imagen banner superior', 'cmb2' ),
		'id'         => PREFIX . 'pageTopBanner_img',
		'type'       => 'file',
	) );

}