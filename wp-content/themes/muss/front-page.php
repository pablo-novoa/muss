<?php 
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

		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif; ?>

	</div>
</div>

<?php echo do_shortcode( '[instagram-feed]', false ); ?>

<?php get_footer(); ?>

