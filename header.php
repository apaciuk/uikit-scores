<?php
require('walker/navigation.php');
require('walker/WordpressUikitCommentsWalker.php');
require('walker/WordpressUikitMenuWalker.php');
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Uikit_Scores
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'uikit_scores' ); ?></a>

	<link id="data-uikit-theme" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/uikit.css"/>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
$nav = wp_nav_menu(array(
    'theme_location' => 'main',
    'menu_class'     => 'uk-navbar-nav uk-hidden-small uk-navbar-flip',
    'depth'          => 2,
    'walker'         => new Walker_UIKIT('navbar'),
    'echo'           => false,
    'fallback_cb'    => false
));
?>
<?php wp_head(); 
// This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
// (right here) into the head of your website. 
// Removing this fxn call will disable all kinds of plugins and Wordpress default insertions. 
// Move it if you like, but I would keep it around.
?>
</head>
<body class="tm-background">
<nav class="tm-navbar uk-navbar uk-navbar-attached uk-navbar-transparent">
            <div class="uk-container uk-container-center">
	<a class="uk-navbar-brand uk-hidden-small" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img class="uk-margin uk-margin-remove" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" width="90" height="30" /></a>
            <?= $nav ?>
            <a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            <div class="uk-navbar-brand uk-navbar-center uk-visible-small">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" width="90" height="30" title="UIkit" alt="UIkit">
        </div>
    </nav>
    <div id="tm-offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <?=  wp_nav_menu(array(
           'theme_location' => 'mobile',
           'menu_class' => 'uk-nav uk-nav-offcanvas uk-nav-parent-icon',
           'depth'          => 2,
           'walker'         => new WordpressUikitMenuWalker('navbar'),
           'echo'           => false,
           'fallback_cb'    => false
            )); ?>
        </div>
    </div>
<main class="main-fluid">
<div class="tm-section">
<div class="uk-container">   
