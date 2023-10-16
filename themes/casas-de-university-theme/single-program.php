<?php get_header();
pageBanner(array(
    'title' => get_the_title()
  ));

while(have_posts()){
    the_post(); ?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i
                    class="fa fa-home" aria-hidden="true"></i> Program Home</a> <span
                class="metabox__main"><?php the_title(); ?></span>
        </p>
    </div>
    <div class="generic-content"><?php the_content() ?></div>

    <?php
    

    $relatedProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type' => 'professor', 
        'orderby' => 'title',
        'meta_query' => array(
          array(
              'key' => 'related_programs', //custom field
              'compare' => 'LIKE',        // means contains
              'value' => '"' . get_the_ID() . '"'    //the id of the current program
              )
          ),
          'order' => 'ASC'
      ));

      if($relatedProfessors->have_posts()){
      echo '<hr class="section-break">';
      echo '<h2 class="headline headline--medium"> '.get_the_title(). ' Professors </h2>';

      while($relatedProfessors->have_posts()) {
        $relatedProfessors->the_post(); ?>
        <ul class="professor-cards">
            <li class="professor-card__list-item">
                <a class="professor-card" href="<?php echo get_permalink(); ?>">
                <img src="<?php the_post_thumbnail_url('professorLandscape'); ?>" alt="" class="professor-card__image">
                <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
            </li>
        </ul>
    <?php } wp_reset_postdata();    
}

            $today = date('Ymd');
            $homepageEvents = new WP_Query(array(
              'posts_per_page' => 2,
              'post_type' => 'event', 
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'meta_query' => array(
                array(
                    'key' => 'event_date',    //custom field
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'related_programs', //custom field
                    'compare' => 'LIKE',        // means contains
                    'value' => '"' . get_the_ID() . '"'    //the id of the current program
                    )
                ),
                'order' => 'DESC'
            ));

            if($homepageEvents->have_posts()){
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Upcoming '. get_the_title(). ' Events </h2>';

            while($homepageEvents->have_posts()) {
              $homepageEvents->the_post();
              get_template_part('template-parts/content-event');
            } wp_reset_postdata();    
            }

            $relatedCampus = get_field('related_campus');
            if($relatedCampus){
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium">Campuses Available for this Program</h2>';
                echo '<ul class="link-list min-list">';
                    
                foreach($relatedCampus as $campus){
                    ?>
                    <li><a href="<?php the_permalink($campus); ?>"><?php echo get_the_title($campus) ?></a></li>
                <?php }
                echo '</ul>';
            }
            ?>


</div>

<?php }

 
get_footer(); ?>