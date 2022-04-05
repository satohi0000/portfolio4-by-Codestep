<?php get_header(); ?> 
<div class="l-contents">
  <article class="l-contents__left">
    <div class="l-contents__left__archive__top">
      <div class="l-contents__left__archive__top__bg"></div>
      <div class="l-contents__left__archive__top__img"></div>
      <div class="l-contents__left__archive__top__word">
        <h1>Search:</h1>
        <p><?php echo $_GET['s']; ?></p> 
      </div>
    </div>
    <div class="l-contents__left__search-result">
      <?php
      if (isset($_GET['s']) && empty($_GET['s'])) { //検索ワードが未入力の場合は、
        echo '検索キーワード未入力'; // '検索キーワード未入力'と出力してください。
      } else { //そうでない場合は
        echo '“'.$_GET['s'] .'”の検索結果：'.$wp_query->found_posts .'件'; // '検索ワードの検索結果'と件数を出力してください。
      }
      ?>
    </div>
    <?php
    if (have_posts()) :
    while (have_posts()) :
    the_post(); ?>
      <div class="p-menu-card" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="p-menu-card__intro">
       <p class="responsive-thumbnail">
         <?php the_post_thumbnail('full'); ?>
        </p>
        <div class="p-menu-card__intro__right">
          <div class="p-menu-card__intro__right__title">
            <h3><?php the_title(); ?></h3>
          </div>
          <div class="p-menu-card__intro__right__except">
            <?php the_excerpt(); ?>
          </div> 
         <div class="p-menu-card__intro__right__permalink">
           <a href="<?php the_permalink(); ?>">詳しく見る</a>
          </div>
        </div>
      </div>
    </div>
    <?php endwhile; 
    else :?>
      <p>表示する記事がありません</p>
    <?php endif; ?>
    </article>
    <?php get_sidebar(); ?>
  </div>

  



<div class="p-pagenation">
  <?php if( function_exists("the_pagination") ) the_pagination(); ?>
</div>
    
    
<?php get_footer(); ?>
<script src="js/jquery-3.6.0.js"></script>
<script src="js/Hamburger.js"></script>
