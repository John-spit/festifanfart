<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <title>Festi Fanf'Art</title>
    
</head>
<body <?php body_class(); ?>>
<header id="header">
  <div class="header-container">
    <div class="header-logo-container">
      <h1 class="none">Festi Fanf'Art</h1>        
        <a class="logo-container" href="<?php echo home_url(); ?>">
          <img class="logo-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logos/logo-festi-blanc-bleu.png" alt="Logo de Festi Fanf'Art">
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
    <button id="burgerMenu" class="burger">
    <span class="burger-line"></span>
    <span class="burger-line"></span>
    <span class="burger-line"></span>
    </button>       
  </div>  
</header>