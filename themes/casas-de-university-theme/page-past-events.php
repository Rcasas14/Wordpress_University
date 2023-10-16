<?php 
  get_header();
  pageBanner(array(
    'title' => 'Past Events',
    'subtitle' => 'Past Events from the university'
  ));
  ?>

<div class="container container--narrow page-section">

  <?php 
$today = date('Ymd');
$pastEvents = new WP_Query(array(
  'paged' => get_query_var('paged', 1), // make the paginate links work
  'post_type' => 'event', 
  'meta_key' => 'event_date', // from the custom field plugin
  'orderby' => 'meta_value_num',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => $today,
      'type' => 'numeric'
    )
  ),
  'order' => 'ASC'
));

  while($pastEvents->have_posts()) {
    $pastEvents->the_post(); 
    get_template_part('template-parts/content-event');
  }
    echo paginate_links(array(
      'total' => $pastEvents->max_num_pages
    ));
  ?>

</div>

<?php get_footer();
?>