<?php 
/** 
 * Template Name: Contacto 
 */ 
get_header(); 

global $topBanner;

?>

<?php if($topBanner && count($topBanner) == 1 && $topBanner[0]['_muss_pageTopBanner_img']): ?>
<section class="muss_page_top_banner">
	<img src="<?= $topBanner[0]['_muss_pageTopBanner_img']; ?>" />
</section>
<?php elseif($topBanner && count($topBanner) > 1): ?>
	<ul class="bxslider">
		<?php foreach ($topBanner as $bannerImg): ?>
	  		<li><img src="<?= $bannerImg['_muss_pageTopBanner_img'] ?>" /></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>

<div class="main_wrapp">
	<div class="page_wrapp">
		
		<div class="contact_page_content">
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<div class="grey_text contact_coma"><span>;</span></div>
			<h1 class="contact_title">comunicate con nosotros <span class="grey_text">,</span></h1>
			<div class="contact_content">
				<?php the_content(); ?>
			</div>

		<?php endwhile; endif; ?>
		</div>

	</div>
</div>


<?php get_footer(); ?>