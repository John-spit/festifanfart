<?php
get_header();
?>

<section class="a-propos-page"> 
  <div class="a-propos-page-container">
    <h2>- Qui sommes nous ? -</h2>
    <div class="a-propos-page-content">         
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
                <p><span class="none">Festival à Pouilly-sous-charlieu</span><?php the_field('a_propos'); ?></p>
                <a href="<?php the_field('lien_linktree'); ?>"target="_blank">Lien Linktr.ee</a>                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun à propos trouvé.</p>';
          endif;
          ?>
    </div>
  </div>
</section>

<section class="festi-map-section">
  <div class="festi-map-dl-container">         
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
                <img class="festi-map-dl" src="<?php the_field('plan_du_festival'); ?>" alt="Plan du festival">
                <a href="http://festifanfart.local/wp-content/uploads/2024/11/marco-bianchetti-scaled.jpg" download>Téléchargez le plan</a>                                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun plan trouvé.</p>';
          endif;
      ?>
  </div>
</section>

<section class="access-festi-section"> 
  <div class="access-festi-container">
    <h2>- Comment nous retrouver ? -</h2>
    <div class="access-festi-content">         
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
                <p><?php the_field('acces_1'); ?></p>
                <p><?php the_field('acces_2'); ?></p>
                <p><?php the_field('acces_3'); ?></p>
                <p><?php the_field('acces_4'); ?></p>
                <p><?php the_field('acces_5'); ?></p>
                <p><?php the_field('acces_6'); ?></p>                                                          
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun accès trouvé.</p>';
          endif;
          ?>
    </div>
  </div>
</section>

<section class="google-map-section">  
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
</section>

<section class="contact-section"> 
  <div class="contact-container">
    <h2>- Comment nous contacter ? -</h2>
    <div class="contact-content">         
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
                <p>Par mail : <a href="#" class="contactBtn">Cliquez ici</a></p>
                <p>Par téléphone : +33 <?php the_field('telephone'); ?></p>
                                                                         
              <?php endwhile;
              wp_reset_postdata();
          else :
              echo '<p>Aucun à propos trouvé.</p>';
          endif;
          ?>
    </div>
  </div>
</section>

<?php
get_footer();
?>