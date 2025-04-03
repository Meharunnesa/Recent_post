<?php

/*
 * Plugin Name:       Recently published posts
 * Description:       This plugin helps users quickly monitor their latest content
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Bristy
 * Text Domain:       RPP
*/



function display_post_widget() {


    wp_add_dashboard_widget(
        'display_post_widget',            
        'Recently Published Post',          
        'display_post'                    
    );
}
add_action('wp_dashboard_setup', 'display_post_widget');
  
  
  
  
function display_post() {

   $posts = get_posts( array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby'        => 'asc',
        'numberposts' => 3,
      ) );
      
    // print_r($posts);

    if (!empty($posts)) {
        echo '<ul>';
        foreach ($posts as $post) {
            echo '<li>';
            echo '<strong><a href="' . get_permalink($post->ID) . '" target="_blank">' . esc_html($post->post_title) . '</a></strong>';
            echo ' - <small>' . get_the_date('F j, Y g:i A', $post->ID) . '</small>';
            echo '</li>';  
        }
        echo '</ul>';
    } else {
        echo 'No recent posts found.';
    }
  
}
  


?>