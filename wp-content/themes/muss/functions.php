<?php
require_once "includes/cmb2init.php";

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
// widget Areas
add_action( 'widgets_init', 'muss_widgets_areas' );


add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );

function sdt_remove_ver_css_js( $src, $handle )
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}

if (!function_exists('muss_widgets_areas')){
function muss_widgets_areas() {

	register_sidebar( array(
		'name'          => 'Sidebar Productos',
		'id'            => 'product_sidebar',
		'before_widget' => '<div  id="%1$s" class="widgetSidebar %2$s product_sidebar_widget" >',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="productSidebar_title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer_1',
		'before_widget' => '<div class="footer_widget_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer_2',
		'before_widget' => '<div class="footer_widget_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer_3',
		'before_widget' => '<div class="footer_widget_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => 'Footer 4',
		'id'            => 'footer_4',
		'before_widget' => '<div class="footer_widget_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
		'name'          => 'Footer 5',
		'id'            => 'footer_5',
		'before_widget' => '<div class="footer_widget_area">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}}


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
	//add woocomerce support
	add_theme_support( 'woocommerce' );
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
  //wp_enqueue_style( 'gridlex', 'https://cdnjs.cloudflare.com/ajax/libs/gridlex/2.3.1/gridlex.min.css' );
	wp_enqueue_style( 'muss-styles', get_theme_file_uri('style.css'), array(), false );
	//== js ==
  wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'scripts', get_theme_file_uri('js/scripts.js'), array('jquery'), false );
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



/**
 * Theme custom settings
 */
add_action('customize_register', 'muss_theme_settings');
function muss_theme_settings($wp_customize){
   //Redes
  $wp_customize->add_section('muss_social_settings', array(
    'title'          => 'muss - Redes Sociales'
   ));
  $wp_customize->add_setting('facebook_setting', array(
   'default'        => '',
   ));
  $wp_customize->add_control('facebook_setting', array(
   'label'   => 'Facebook',
   'section' => 'muss_social_settings',
   'type'    => 'url',
  ));
  $wp_customize->add_setting('instagram_setting', array(
   'default'        => '',
   ));
  $wp_customize->add_control('instagram_setting', array(
   'label'   => 'Instagram',
   'section' => 'muss_social_settings',
   'type'    => 'url',
  ));

}


add_action( 'admin_init', 'muss_hide_editor' );
function muss_hide_editor() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if($template_file == 'template-contact.php'){ // edit the template name
        remove_post_type_support('page', 'editor');
    }
}



/**
 * WooCommerce stuff
 */

