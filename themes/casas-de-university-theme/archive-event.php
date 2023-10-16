<?php
  get_header();
  pageBanner(array(
    'title' => 'All Events',
    'subtitle' => 'All Events from the university'
  ));
  ?>

<div class="container container--narrow page-section">
    <?php 
  while(have_posts()) {
    the_post(); 
    get_template_part('template-parts/content-event');
  }
    echo paginate_links();
  ?>

    <hr class="section-break">
    <p>Recap for Past Events, <a href="<?php echo site_url('/past-events'); ?>">Check it here!</a>.</p>

</div>

<?php get_footer();
?>