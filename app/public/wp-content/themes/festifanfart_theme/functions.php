<?php

function festifanfart_enqueue_scripts() {
    wp_enqueue_style('parent', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child', get_stylesheet_directory_uri() . '/assets/css/main.css', array('parent'), '1.0', 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap', array(), null);
    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'festifanfart_enqueue_scripts');

// Ajout du menu dans le back-office
function festifanfart_add_menus() {
    // Déclare le support des menus
    add_theme_support('menus');

    // Enregistre des emplacements de menu
    register_nav_menus(array(
        'menu-principal' => __('Menu Principal', 'festifanfart'),
        'footer-menu'    => __('Menu Pied de page', 'festifanfart'),
    ));
}
add_action('after_setup_theme', 'festifanfart_add_menus');

// Ajout d'un id sur un element créé du menu
function add_menu_link_class($atts, $item, $args) {
    if ($item->title == 'Contact') {
        $atts['id'] = 'contactBtn';
        
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 3);


?>