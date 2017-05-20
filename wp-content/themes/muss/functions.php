<?php
//require_once "includes/cmb2init.php";

//enqueue scripts & styles
add_action('wp_enqueue_scripts', 'muss_enqueueu' );
//register menues
add_action('init', 'muss_register_menus' );
//register main sidebar
add_action( 'widgets_init', 'muss_sidebar_register' );
//add theme supports
add_action('after_setup_theme', 'muss_add_theme_support' );
//svg format to media library
add_filter('upload_mimes', 'cc_mime_types');


if (!function_exists('cc_mime_types')) {
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}}

if (!function_exists('muss_add_theme_support')) {
function muss_add_theme_support(){
	//add thumbnail support
	add_theme_support( 'post-thumbnails' );
	//add custom background support
	add_theme_support( 'custom-background');
	//add html5 support for search forms, comment forms, comment lists, gallery, and caption
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

}}

if (!function_exists('muss_register_menus')) {
function muss_register_menus() {
	register_nav_menus(
		array(
		  'header-menu' => 'Header Menu',
		  'footer-menu' => 'Footer Menu'
		)
	);
}}

if (!function_exists('muss_enqueueu')) {
function muss_enqueueu(){
	//== css ==
  wp_enqueue_style( 'gridlex', 'https://cdnjs.cloudflare.com/ajax/libs/gridlex/2.3.1/gridlex.min.css' );
	wp_enqueue_style( 'muss-styles', get_theme_file_uri('style.css'), array('gridlex') );
	//== js ==
  wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'scripts', get_theme_file_uri('js/scripts.js'), array('jquery') );
}}

if (!function_exists('muss_sidebar_register')) {
function muss_sidebar_register() {

	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'main_sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s main_sidebar_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget_title">',
		'after_title'   => '</h5>',
	) );

}}
