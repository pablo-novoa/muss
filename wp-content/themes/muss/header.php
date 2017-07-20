<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">

  <meta name="theme-color" content="#231f20">
  <meta name="msapplication-navbutton-color" content="#231f20">
  <meta name="apple-mobile-web-app-status-bar-style" content="#231f20">

  <title><?php wp_title('| '.bloginfo('name'), true, 'left'); ?></title>
  <link rel="icon" sizes="16x16 32x32" href="<?php echo get_theme_file_uri('img/favicon.png'); ?>">


  <?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>

  <header id="main_header">
    <div class="main_wrapp header_box">
      <a href="/" class="header_logo">
        <!--
        <span class="logo_text">muss</span>
        <span class="grey_text" style="margin-left: -5px;"> , l.w.</span>
        -->
        <img src="<?= get_theme_file_uri('img/logo.svg'); ?>" class="logo_img" width="auto" height="35"/>
      </a>

      <div>
        <button type="button" class="menu_burguer">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>

      <div class="header_menu_wrap">
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

          <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
           
              $count = WC()->cart->cart_contents_count;
              ?>

              <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cartButton">
              <?php if ( $count > 0 ): ?>
                <img src="<?= get_theme_file_uri('img/cart_items.svg'); ?>" class="cart_items_img" width="auto" height="35"/>
              <?php endif; ?>
                <img src="<?= get_theme_file_uri('img/cart.svg'); ?>" class="cart_img" width="auto" height="35"/>
              </a>
           
          <?php } ?>

        </div>
      </div>
    </div>
	</header>

  <main id="mainContainer">
    
<?php  



$topBanner = get_post_meta( get_the_ID(), '_muss_pageTopBanner', true );
$GLOBALS['topBanner'] = $topBanner;

?>