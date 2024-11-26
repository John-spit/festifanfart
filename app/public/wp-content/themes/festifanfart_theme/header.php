<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>
<header id="header">

    <div class="header-logo-container">        
        <a class="logo-container" href="<?php echo home_url(); ?>">
          <img class="logo-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/logo-festi-bleu-lettres-blanches.png" alt="Logo de Festi Fanf'Art">
        </a>       
    </div>               
    <div class="nav" id="navMenu">
        <?php
          wp_nav_menu(array(
            'menu' => 'Principal',
            'menu_class' => 'nav-menu',
            ));
        ?>            
    </div>       
    
    
</header>