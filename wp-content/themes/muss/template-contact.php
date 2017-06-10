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

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>

	</div>
</div>


<?php get_footer(); ?>