<?php 
function university_post_types() {
    // post type : event
    register_post_type('event', array(
        'supports' => array('title', 'editor', 'excerpt'),
        'rewrite' => array('slug' => 'events'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => 'true',
        'labels'=> array(
            'name'=> 'Events',
            'add_new_item' => 'Add New Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'  
        ),
        'description' => 'Latest events for you',
        'menu_icon'=> 'dashicons-calendar'
        ));

        // post type : program
        register_post_type('program', array(
            'supports' => array('title', 'editor'),
            'rewrite' => array('slug' => 'programs'),
            'has_archive' => true,
            'public' => true,
            'show_in_rest' => 'true',
            'labels'=> array(
                'name'=> 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program',
                'all_items' => 'All Program',
                'singular_name' => 'Program'  
            ),
            'description' => 'The Program Page',
            'menu_icon'=> 'dashicons-awards'
            ));
}
add_action('init', 'university_post_types');
?>