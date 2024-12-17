<?php
get_header();
?>

<section class="photos-section">
  <div class="photos-container">
      <h1>Galerie photo</h1>
      <div class="photos-content">
          <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'galery_photo',
              'posts_per_page' => -1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                    <img class="photos-galery" src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">                   
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune photo trouvée.</p>';
          endif;
          ?>
      </div>
  </div>
</section>

<section class="videos-section">
  <div class="videos-container">
      <h2>Galerie vidéo</h2>
      <div class="video-content">
          <?php
          // Arguments de la requête personnalisée
          $args = array(
              'post_type' => 'galery_video',
              'posts_per_page' => -1,
          );

          // Créer une nouvelle requête
          $query = new WP_Query($args);

          // Vérifier si des publications existent
          if ($query->have_posts()) :
              while ($query->have_posts()) : $query->the_post(); ?>
                  <div class="videos">
                    <video controls>
                      <source src="<?php the_field('video'); ?>" type="video/mp4">
                        Votre navigateur ne supporte pas les vidéos HTML5. Vous pouvez télécharger la vidéo à partir 
                        de <a href="<?php the_field('video'); ?>">ce lien</a>.
                    </video>
                  </div>
              <?php endwhile;
              wp_reset_postdata(); // Réinitialiser les données globales de publication
          else :
              echo '<p>Aucune vidéo trouvée.</p>';
          endif;
          ?>
      </div>
  </div>
</section>

<?php
get_footer();
?>