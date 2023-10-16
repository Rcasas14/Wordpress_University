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

            // post type: professors
            register_post_type('professor', array(
                'supports' => array('title', 'editor', 'thumbnail'),
                'public' => true,
                'show_in_rest' => 'true',
                'labels'=> array(
                    'name'=> 'Professors',
                    'add_new_item' => 'Add New Professor',
                    'edit_item' => 'Edit Professor',
                    'all_items' => 'All Professor',
                    'singular_name' => 'Professor'  
                ),
                'description' => 'Professors Management Page',
                'menu_icon'=> 'dashicons-welcome-learn-more'
                ));
            // post type: campus
            register_post_type('campus', array(
                'supports' => array('title', 'editor'),
                'rewrite' => array('slug' => 'campuses'),
                'has_archive' => true,
                'public' => true,
                'show_in_rest' => 'true',
                'labels'=> array(
                    'name'=> 'Campuses',
                    'add_new_item' => 'Add New Campus',
                    'edit_item' => 'Edit Campus',
                    'all_items' => 'All Campus',
                    'singular_name' => 'Campus'  
                ),
                'description' => 'The Campus',
                'menu_icon'=> 'dashicons-location-alt'
                ));
}
add_action('init', 'university_post_types');
?>