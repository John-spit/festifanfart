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
    <h2>Qui sommes nous ?</h2>
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
                <p><?php $apropos = get_field('a_propos');
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
        <img class="a-propos-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/tour-orange.png" alt="Illustration d'une cheminée d'usine à charbon">
      </div>
    </div>
  </div>
</section>

<section class="banner-program">
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
    <h2>Galerie</h2>
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
  <iframe class="google-maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d40032.373252997306!2d4.0932768558094175!3d46.1355219145956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f3f7ce409be979%3A0x59cbf8c17161aa5a!2s42720%20Pouilly-Sous-Charlieu!5e0!3m2!1sfr!2sfr!4v1733822615513!5m2!1sfr!2sfr" 
    width="800" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
  </iframe>
  <div class="adress-container">
    <p class="adress">Lorem ipsum dolor sit amet consectetur adipisicing elit, dolorem praesentium nulla!</p>
    <a class="see-more" href="<?php echo get_permalink( get_page_by_path( 'a-propos' ) ); ?>">Voir plus</a>    
  </div>
</section>

<section class="sponsors">
  <div class="sponsors-container">
    <h2>Sponsors et partenaires</h2>
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