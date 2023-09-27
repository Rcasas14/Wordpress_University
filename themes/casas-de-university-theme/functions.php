<?php 

function university_files(){
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true); // if javascript use 'wp_enqueue_script'
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i'); // if javascript use 'wp_enqueue_script'
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); // if javascript use 'wp_enqueue_script'
    wp_enqueue_style('university_main_style', get_theme_file_uri('/build/style-index.css')); // if javascript use 'wp_enqueue_script'
    wp_enqueue_style('university_extra_style', get_theme_file_uri('/build/index.css')); // if javascript use 'wp_enqueue_script'
}

add_action('wp_enqueue_scripts', 'university_files');

function university_features(){
    // register_nav_menu('headerMenuLocation', 'Header Menu Location'); //--dont remove
    // register_nav_menu('footerLocationOne', 'Footer Location One');
    // register_nav_menu('footerLocationTwo', 'Footer Location Two');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query) {
    if(!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }
    

    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
        $today = date('Ymd');
        $query->set('meta_key', 'event_date'); //'meta_key' => 'event_date', and so on
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
              'key' => 'event_date',
              'compare' => '>=',
              'value' => $today,
              'type' => 'numeric'
            )
          ));
    }

    // if(!is_admin()) {
    //     if($query->is_main_query()){

    //         if(is_post_type_archive('program')){
    //             $query->set('orderby', 'title');
    //             $query->set('order', 'ASC');
    //             $query->set('posts_per_page', -1);

    //         } else if (is_post_type_archive('event')){
    //             $today = date('Ymd');
    //             $query->set('meta_key', 'event_date'); //'meta_key' => 'event_date', and so on
    //             $query->set('orderby', 'meta_value_num');
    //             $query->set('order', 'ASC');
    //             $query->set('meta_query', array(
    //                 array(
    //                 'key' => 'event_date',
    //                 'compare' => '>=',
    //                 'value' => $today,
    //                 'type' => 'numeric'
    //                 )
    //             ));
    //         }
    //     }
    // }
}

add_action('pre_get_posts', 'university_adjust_queries');


?>