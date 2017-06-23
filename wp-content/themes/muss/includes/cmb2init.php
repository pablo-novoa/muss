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


	$muss_pageOptions_banners = $muss_pageOptions->add_field( array(
		'id'          => PREFIX . 'pageTopBanner',
		'type'        => 'group',
		'description' => __( 'Banner', 'cmb2' ),
		// 'repeatable'  => false, // use false if you want non-repeatable group
		'options'     => array(
			'group_title'   => __( 'Imagen {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
			'add_button'    => __( 'Agregar otra imagen', 'cmb2' ),
			'remove_button' => __( 'Remover Imagen', 'cmb2' ),
			'sortable'      => true, // beta
			// 'closed'     => true, // true to have the groups closed by default
		),
	) );

	// Id's for group's fields only need to be unique for the group. Prefix is not needed.
	$muss_pageOptions->add_group_field( $muss_pageOptions_banners, array(
		'name'       => 'Archivo',
		'id'         => PREFIX . 'pageTopBanner_img',
		'type'       => 'file',
		// 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
	) );

}