<!-- 投稿ページ -->
<?php get_header(); ?> 
  <div class="p-article">
    <article class="p-article__left">
      <div class="p-article__left__single__top">
        <div class="p-article__left__single__top__img"></div>
        <div class="p-article__left__single__top__word">
          <a href="#">
          <?php the_title(); ?>
        </a>
        </div>
      </div>
      <div class="p-article__left__single__bottom">
        <?php if(have_posts()): 
        while(have_posts()):
        the_post();?>
      </div>
      <div class="p-article__left__topic">
        <div id="post-<?php the_ID(); ?>"<?php post_class(); ?><?php the_content(); ?>
        <?php endwhile;else: ?>
        <p>表示する記事がありません</p>
        <?php endif; ?>
      </div>
    </article>
    <?php get_sidebar(); ?> 
  </div> 
<?php get_footer(); ?>
<?php wp_link_pages(); ?>