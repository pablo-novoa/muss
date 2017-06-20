<?php 
/** 
 * Template Name: Contacto 
 */ 
get_header(); 

$topBannerImg = get_post_meta( get_the_ID(), '_muss_pageTopBanner_img', true );

?>

<?php if($topBannerImg): ?>
<section class="muss_page_top_banner">
	<img src="<?= $topBannerImg; ?>" />
</section>
<?php endif; ?>

<div class="main_wrapp">
	<div class="page_wrapp">
		
		<div class="contact_page_content">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="grey_text">;</div>
			<h1>comunicate con nosotros <span class="grey_text">,</span></h1>
			<div>
				<?php the_content(); ?>
			</div>

		<?php endwhile; endif; ?>
		</div>

	</div>
</div>


<?php get_footer(); ?>