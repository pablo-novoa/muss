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
	'color' => $product->get_attribute( 'pa_color' ),
	'size' => $product->get_attribute( 'pa_tamano' ),
	'dimensiones' => $product->get_attribute( 'pa_dimensiones' )
];

?>


<li <?php post_class(); ?>>

	<div class="product_card">
		<?php 
			echo $prodThumb; 
		?>
		<div class="prod_card_content">
			<div class="muss_comillaBaja"></div>
			<div class="prod_card_content_data">
				<strong class="prod_card_title"><?= $prodTitle; ?></strong>
				<div>
					precio<span class="grey_text">:</span> 
					<span class="grey_text">$</span>
					<strong><?= $product->price; ?></strong>
				</div>
				<div>
					tamaño<span class="grey_text">:</span> 
					<?= $prodAttrs['dimensiones']; ?>
				</div>
				<div>
					color<span class="grey_text">:</span> 
					<?php  
						/*foreach ($prodAttrs['color'] as $color) {
							var_dump($color);
						}*/
					?>
				</div>
			</div>
			<div class="">+</div>
		</div>
	</div>
	<div class="muss_comas"></div>
	
</li>
