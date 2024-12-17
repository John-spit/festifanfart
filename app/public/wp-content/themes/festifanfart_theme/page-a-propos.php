<?php
get_header();
?>

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
                <p><?php the_field('a_propos'); ?></p>                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun à propos trouvé.</p>';
          endif;
          ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>