<footer class="l-footer">
  <div class="l-footer__center">
    <?php 
            wp_nav_menu( array( 
                'theme_location' => 'footer-menu' 
            ) ); 
        ?>    
  </div>
  <div class="l-footer__copyright">
  <p> 
        <small>Copyright : <?php bloginfo( 'name' ); ?> 2022</small>
    </p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
