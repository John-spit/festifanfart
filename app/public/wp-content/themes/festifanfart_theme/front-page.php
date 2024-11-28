<?php

get_header();
?>

<div class="hero-header">
    <h1>
      <div class="title-container">
        <span class="title-name">Festi Fanf'Art</span>
        <span class="title-date">07 juin</span>
        <span class="title-hours">De 09H à 20H</span> 
      </div>
    </h1>
</div>

<section class="a-propos"> 
  <div class="a-propos-container">
    <h2>Qui sommes nous ?</h2>
    <div class="a-propos-content">
      <div class="a-propos-text">         
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil velit ipsa excepturi iure magni rem ullam sequi minima, 
          molestiae dignissimos tempora quisquam facilis mollitia incidunt officia eligendi explicabo veritatis ut.
          Lorem ipsum dolor sit amet consectetur adipisicing elit... 
        </p>
        <a class="see-more" href="<?php echo get_permalink( get_page_by_path( 'a-propos' ) ); ?>">Voir plus</a>
      </div>
      <div class="a-propos-img-container">  
        <img class="a-propos-img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/elements_graphiques/tour-jaune.png" alt="Illustration d'une cheminée d'usine à charbon">
      </div>
    </div>
  </div>
</section>

<section class="programmation">
  <div>

  </div>



</section>






<?php

get_footer();
?>