<?php
get_header();
?>

<section>
<div class="evenement">
    <h1>Programmation</h1>
    <div class="artistes-container">
        <?php
        // Arguments de la requête personnalisée
        $args = array(
            'post_type' => 'prog_artistes', // Le slug de votre CPT
            'posts_per_page' => -1,   // Récupérer tous les artistes
        );

        // Créer une nouvelle requête
        $query = new WP_Query($args);

        // Vérifier si des publications existent
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="artiste">
                    <h2><?php the_field('nom_de_lartiste_ou_du_groupe'); ?></h2>
                    <img src="<?php the_field('photo_de_lartiste_ou_du_groupe'); ?>" alt="<?php the_title(); ?>">
                    <p><?php the_field('presentation_de_lartiste_ou_du_groupe'); ?></p>                   
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


<section>
<div class="evenement">
    <h2>Artisans et commerçant</h2>
    <div class="artistes-container">
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
                <div class="artiste">
                    <h2><?php the_field('nom_de_lartisan_ou_de_lentreprise'); ?></h2>
                    <img src="<?php the_field('photo'); ?>" alt="<?php the_title(); ?>">
                    <p><?php the_field('presentation_de_lartisan_ou_de_lentreprise'); ?></p>                   
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


<?php
get_footer();
?>