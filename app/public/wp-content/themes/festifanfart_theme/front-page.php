<?php

get_header();
?>

<div class="hero-header">
<?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'hero_img',
              'posts_per_page' => 1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); 
                    $background_hero = get_field('hero_image'); 
                ?>                
                <div class="hero-container" style="background-image: url('<?php echo esc_url($background_hero); ?>');" data-index="<?php echo $index; ?>">                                    
                    <h2 class="none">Festi Fanf'Art festival à pouilly-sous-charlieu</h2>
                </div>
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune photo trouvée.</p>';
          endif;
          ?>   
</div>

<section class="a-propos"> 
  <div class="a-propos-container">
    <h2>- Qui sommes nous ? -</h2>
    <div class="a-propos-content">
      <div class="a-propos-text">         
      <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'a_propos',
              'posts_per_page' => 1,   
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>                        
                <p><span class="none">Festi Fanf'art est un festival dans la Loire, à Pouilly-sous-charlieu</span><?php $apropos = get_field('a_propos');
                          echo mb_substr($apropos, 0, 220) . '...'; // Limite à 100 caractères ?></p>                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun à propos trouvé.</p>';
          endif;
          ?>
        <a class="see-more" href="<?php echo get_permalink( get_page_by_path( 'a-propos' ) ); ?>">Voir plus</a>
      </div>
      <div class="a-propos-img-container">  
        <img class="a-propos-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/dégradé-orange.png" alt="Illustration d'une cheminée d'usine à charbon">
      </div>
    </div>
  </div>
</section>

<section class="banner-program">
    <h2 class="none">Festi Fanf'Art : Festival dans la Loire, Pouilly-sous-charlieu</h2>
    <div class="carousel-wrapper">
        <?php
        $args = array(
            'post_type' => 'prog_artistes',
            'posts_per_page' => -1,
        );

        $query = new WP_Query($args);
        $total_posts = $query->post_count; // Nombre total de posts

        if ($query->have_posts()) :
            $index = 0;
            while ($query->have_posts()) : $query->the_post(); 
                $background_image = get_field('photo_de_lartiste_ou_du_groupe'); 
                ?>
                <div class="carousel-item" style="background-image: url('<?php echo esc_url($background_image); ?>');" data-index="<?php echo $index; ?>">
                  <div class="carousel-content">
                      <h2><?php the_field('nom_de_lartiste_ou_du_groupe'); ?></h2>
                      <p>
                          <?php 
                          $presentation = get_field('presentation_de_lartiste_ou_du_groupe');
                          echo mb_substr($presentation, 0, 220) . '...'; // Limite à 100 caractères
                          ?>
                      </p>
                      <a class="see-more-prog" href="<?php echo get_permalink( get_page_by_path( 'programmation' ) ); ?>">Voir plus</a>
                  </div>
                </div>
            <?php 
            $index++;
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p>Aucun artiste trouvé.</p>
        <?php endif; ?>
    </div>
    
    <!-- Flèches -->
    <img class="carousel-prev" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/arrow_left.png" alt="Flèche de gauche">
    <img class="carousel-next" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/arrow_right.png" alt="Flèche de droite">

    <!-- Indicateurs (bullets) -->
    <div class="carousel-indicators">
        <?php for ($i = 0; $i < $total_posts; $i++) : ?>
            <span class="carousel-bullet" data-index="<?php echo $i; ?>"></span>
        <?php endfor; ?>
    </div>    
</section>

<section class="galery">
  <div class="galery-container">
    <h2>- Galerie -</h2>
    <div class="galery-content">
    <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'galery_photo',
              'posts_per_page' => 6,
              'orderby' => 'rand'
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                    <img class="photos" src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">                                    
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune photo trouvée.</p>';
          endif;
          ?>
    </div>
    <a class="see-more-galery" href="<?php echo get_permalink( get_page_by_path( 'galerie' ) ); ?>">Voir plus</a>
  </div>
</section>

<section class="nous-trouver">
<?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'a_propos',
              'posts_per_page' => -1,   
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>                        
                <iframe class="google-maps"<?php the_field('google_map'); ?> title="Google maps"></iframe>                                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun plan trouvé.</p>';
          endif;
      ?>
  <div class="adress-container">
    <p class="adress">Toutes les conditions d'accès sont <span><a class="see-more" href="<?php echo get_permalink( get_page_by_path( 'a-propos' ) ); ?>">ici</a></span> .</p>       
  </div>
</section>

<section class="sponsors">
  <div class="sponsors-container">
    <h2>- Sponsors et partenaires -</h2>
    <div class="sponsors-content">
          <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'sponsor',
              'posts_per_page' => -1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                    <img class="sponsors-logos" src="<?php the_field('logos'); ?>" alt="<?php the_title(); ?>">                   
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun sponsor ou partenaire trouvé.</p>';
          endif;
          ?>
      </div>
  </div>

</section>

<?php

get_footer();
?>