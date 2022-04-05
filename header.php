<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header>
    <div class="l-header">
        <div class="l-header__left">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <h1><?php bloginfo( 'name' ); ?></h1></a>
            <p><?php bloginfo( 'description' ); ?></p>
            <?php get_search_form(); ?>
        </div>
        <div class="l-header__left__menu">
            <div class="l-header__left__menu__botton">Menu</div>
        </div>
        <div class="l-header__right"></div>
        
    </header>