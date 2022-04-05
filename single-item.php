<?php get_header(); ?>
  <div class="p-article">
    <article class="p-article__left">
      <?php
      if(have_posts()): while(have_posts()): the_post(); ?>
      <div class = "p-menu-card_custom">
        <div class="p-menu-card_custom_top" id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
         <?php the_post_thumbnail(); ?>
        </div>
        <div class="p-menu-card__intro-custom">
          <h1><?php the_title(); ?></h1>
          <div class="p-menu-card__intro-custom__info">
          <p>価格：<?php $price = get_post_meta(get_the_ID(  ), '価格', true); ?><?php echo $price; ?>円</p>
          <p>アレルギー：<?php $allergie = get_post_meta(get_the_ID(  ), 'アレルギー', true); ?><?php echo $allergie; ?></p>
          </div>
        </div>
        <?php the_content(); ?>
        <?php endwhile; else:?>
          <p>商品がありません</p>
          <?php endif; ?>
      </div>
    </article>
    <?php get_sidebar(); ?> 
  </div> 
  <?php comments_template(); ?>
  
<?php get_footer(); ?>

