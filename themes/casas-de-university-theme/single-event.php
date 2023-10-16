<?php get_header();
pageBanner(array(
    'title' => get_the_title()
  ));

while(have_posts()){
    the_post(); ?>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i
                    class="fa fa-home" aria-hidden="true"></i> Event Home</a> <span
                class="metabox__main"><?php the_title(); ?></span>
        </p>
    </div>
    <div class="generic-content"><?php the_content(); ?></div>
    <hr class="section-break">
    
    <?php 
    $relatedPrograms = get_field('related_programs'); // this variable is array
    if($relatedPrograms){
        echo '<h2 class="headline headline--medium">Related Programs</h2>';
        echo'<h2 class="headline headline--medium">';
        echo '<ul class="link-list min-list">';
        foreach($relatedPrograms as $program){ //to get each index 
            ?>
        <li><a href="<?php echo get_permalink($program); ?>"><?php echo get_the_title($program) ?></a></li>
        <?php }
        echo '</ul>';
        echo '</h2>';
    }
?>

</div>

<?php }

 
get_footer(); ?>