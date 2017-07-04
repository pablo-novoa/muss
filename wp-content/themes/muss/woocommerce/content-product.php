<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<?php  

/**
 *  Set Product Data
 */

$prodThumb = woocommerce_get_product_thumbnail();
$prodLink = get_the_permalink();
$prodTitle = get_the_title();

$prodAttrs = [
	'color' => array(),
	'size' => $product->get_attribute( 'pa_tamano' ),
	'dimensiones' => $product->get_attribute( 'pa_dimensiones' )
];

//color
$product_colors = get_the_terms( $post, 'product_color' );
$saved_colors = get_option( 'nm_taxonomy_colors' );
if(isset($product_colors) && is_array($product_colors)){
	foreach($product_colors as $color){
		$term_id = $color->term_id;
		$hex_code = $saved_colors[$term_id];

		$colorData = array(
			'name' => $color->name,
			'code' => $hex_code,
		);
		array_push($prodAttrs['color'], $colorData);
	}
}


?>


<li <?php post_class(); ?>>

	<div class="product_card">
		<?php 
			echo $prodThumb; 
		?>
		<div class="prod_card_content">
			<div class="muss_comillaBaja"></div>
			<div class="prod_card_content_data">
				<a href="<?= get_permalink(); ?>">
					<strong class="prod_card_title"><?= $prodTitle; ?></strong>
				</a>
				<div>
					precio<span class="grey_text">:</span> 
					<span class="grey_text">$</span>
					<strong><?= $product->price; ?></strong>
				</div>
			<?php if(!empty($prodAttrs['dimensiones']) ): ?>
				<div>
					tamaño<span class="grey_text">:</span> 
					<?= $prodAttrs['dimensiones']; ?>
				</div>
			<?php endif; ?>
			<?php if(!empty($prodAttrs['color']) ): ?>
				<div>
					color<span class="grey_text">:</span> 
					<?php  
						foreach ($prodAttrs['color'] as $color) {
							echo '
								<span class="colorRadio" style="background:'.$color['code'].';"></span>
							';
						}
					?>
				</div>
			<?php endif; ?>
			</div>
			<a href="<?php echo $product->add_to_cart_url(); ?>" class="prod_card_addToCart">+</a>
		</div>
	</div>
	<div class="muss_comas"></div>
	
</li>
