<?php
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-header' );
add_theme_support( "wp-block-styles" );
add_theme_support( "responsive-embeds" );
add_theme_support( "html5", $args );
add_theme_support( "custom-background", $args );
add_theme_support( "align-wide" );


function hamburger_title( $title ) {
    if ( is_front_page() && is_home() ) { //表示されたページがフロントページかつメインページなら
        $title = get_bloginfo( 'name', 'display' ); //タイトルはブログのサイト名にしてください
    } elseif ( is_singular() ) { //表示されたページが個別投稿ページなら
        $title = single_post_title( '', false ); //タイトルは投稿記事のタイトルにしてください
    }
    return $title;
}
add_filter( 'pre_get_document_title', 'hamburger_title' ); //

function hamburger_script(){ 
    wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/css/hamburger.css', array(), '1.0.0' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
    wp_enqueue_script( 'toggle', get_template_directory_uri() . '/js/Hamburger.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.6.0.js', "", "3.6.0", true );
}
add_action( 'wp_enqueue_scripts', 'hamburger_script' );


function hamburger_widgets_init() {
    register_sidebar (
        array(
            'name'          => 'All Menu',
            'id'            => 'menu_widget',
            'description'   => 'メニューの一覧です',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="c-category-title">',
            'after_title'   => "</h2>\n",
        )
    );
}
add_action( 'widgets_init', 'hamburger_widgets_init' );

//カスタムメニュー
function custom_theme_setup() {
    //メニューの登録
    register_nav_menus(array(
        'global-menu' => 'アーカイブ' ,
        'side-menu' => 'サイドメニュー',
        'footer-menu' => 'フッターメニュー',
        
    ));
}
add_action( 'after_setup_theme', 'custom_theme_setup' );

function the_pagination() {
    global $wp_query;
    $big = 999999999;
    if ( $wp_query->max_num_pages <= 1 )
        return;
    echo '<nav class="pagination">';
    echo paginate_links( array(
        'base'         => str_replace( $big, '%#%', esc_url( get_pagenum_link($big) ) ),
        'format'       => '',
        'current'      => max( 1, get_query_var('paged') ),
        'total'        => $wp_query->max_num_pages,
        'prev_text'    => '<<',
        'next_text'    => '>>',
        'type'         => 'list',
        'end_size'     => 1,
        'mid_size'     => 1
    ) );
    echo '</nav>';
}

function add_my_editor_styles() {
    add_theme_support( 'editor-styles' );
    add_editor_style( get_theme_file_uri( '/css/style.css'));
 }
add_action( 'admin_init', 'add_my_editor_styles' );

function lds_sc_box(){
  register_block_pattern(
    'my-shortcode/box',
    array(
      'title'       => 'box',
      'description' => 'WEBEERにリンクを貼るテスト',
      'content'     => '<a href="https://webeer.tech">WEBEER</a>',
      'keywords'    => 'kanren',
      'categories' => array( 'shortcode' )
    )
  );
  register_block_pattern_category(
    'shortcode',
    array( 'label' => 'ショートコード' )
  );
}
add_action( 'init', 'lds_sc_box' );

register_sidebar(
    array(
      'name'          => 'タグウィジェット',
      'id'            => 'tag_widget',
      'description'   => 'タグ用ウィジェットです',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2><i class="fa fa-tags" aria-hidden="true"></i>',
      'after_title'   => "</h2>\n",
    )
);

register_sidebar(
    array(
      'name'          => 'アーカイブウィジェット',
      'id'            => 'archive_widget',
      'description'   => 'アーカイブ用ウィジェットです',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2><i class="fa fa-archive" aria-hidden="true"></i>',
      'after_title'   => "</h2>\n",
    )
);

register_block_style(
    'core/image', // ブロック名
    [
        'name'         => 'shadow', // スタイルで付けるクラスに使う名前
        'label'        => '影付き',
        'inline_style' => '.is-style-shadow {
            box-shadow: 10px 5px 5px black;
        }', // 追加するCSS
    ]
);

//投稿一覧とカスタム投稿タイプの記事を混ぜるコード
function change_posts_per_page($query) {
 
    if ( is_admin() || ! $query->is_main_query() ){
         return;
     }
    if ( is_front_page() && $query->is_main_query() ){
         $query->set('post_type', array( 'post', 'item'));
         return;
     }
    }
    add_action( 'pre_get_posts', 'change_posts_per_page' );
    




