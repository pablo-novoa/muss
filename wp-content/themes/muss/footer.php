

<footer id="page_footer">
  <div class="main_wrapp footer_content">
    <div class="footer_icon grey_text">&</div>
    <div class="footer_widgets_wrapp">
      <?php
      dynamic_sidebar( 'footer_1' );
      dynamic_sidebar( 'footer_2' );
      dynamic_sidebar( 'footer_3' );
      dynamic_sidebar( 'footer_4' );
      dynamic_sidebar( 'footer_5' );
      ?>
    </div>

  </div>
</footer>
<?php wp_footer(); ?>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-109308443-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-109308443-1');
</script>

</main>
</body>
</html>
