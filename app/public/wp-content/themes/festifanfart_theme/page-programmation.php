<?php
get_header();
?>

<section class="artists-section">
  <h1 class="none">Programmation</h1>
  <div class="artists-container">
      <h2 class="artists-title">- Artistes -</h2>
      <div class="artists-content">
          <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'prog_artistes',
              'posts_per_page' => -1,   
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="artists">
                      <h2><span><?php the_field('nom_de_lartiste_ou_du_groupe'); ?></span></h2>
                      <div class="artist-infos">
                        <img src="<?php the_field('photo_de_lartiste_ou_du_groupe'); ?>" alt="<?php the_title(); ?>">
                        <p><?php the_field('presentation_de_lartiste_ou_du_groupe'); ?></p>
                      </div>                   
                  </div>
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun artiste trouvé.</p>';
          endif;
          ?>
      </div>
  </div>
</section>


<section class="artisans-traders-section">
  <div class="artisans-traders-container">
      <h2 class="artisans-traders-title">- Artisans et commerçant -</h2>
      <div class="artisans-traders-content">
          <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'prog_artisans', // Le slug de votre CPT
              'posts_per_page' => -1,   // Récupérer tous les artistes
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="artisans-traders">
                      <h2><span><?php the_field('nom_de_lartisan_ou_de_lentreprise'); ?></span></h2>
                      <div class="artisans-traders-infos">
                        <img src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">
                        <p><?php the_field('presentation_de_lartisan_ou_de_lentreprise'); ?></p>
                      </div>                   
                  </div>
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucun artisan ou commerçant trouvé.</p>';
          endif;
          ?>
      </div>
  </div>
</section>


<?php
get_footer();
?>