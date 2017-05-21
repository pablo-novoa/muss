<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title('| '.bloginfo('name'), true, 'left'); ?></title>
  <link rel="icon" sizes="16x16 32x32" href="<?php echo get_theme_file_uri('img/favicon.png'); ?>">


  <?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>

  <header id="main_header">
    <div class="grid grid-noGutter grid-middle col main_wrapp">
      <a href="/" class="header_logo">
        <span class="logo_text">muss</span>
        <span class="grey_text" style="margin-left: -5px;">, l.w.</span>
      </a>

      <div class="grid grid-noGutter grid-middle grid-spaceBetween col">
        <?php
  			wp_nav_menu( array(
  				'theme_location'  => 'header-menu',
  				'container'       => 'nav',
  				'container_class' => 'main_nav',
  				'container_id'    => 'header_menu'
  			));
  			?>
        <div class="header_right_box">
          <span>redes</span class="grey_text"><span>:</span>
          <?php if(get_theme_mod('facebook_setting')): ?>
            <a href="<?= get_theme_mod('facebook_setting'); ?>" class="muss_comas" target="_blank">facebook</a>
          <?php endif; ?>
          <?php if(get_theme_mod('instagram_setting')): ?>
            <a href="<?= get_theme_mod('instagram_setting'); ?>" class="muss_punto" target="_blank">instagram</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
	</header>

  <main id="mainContainer" class="main_wrapp">
