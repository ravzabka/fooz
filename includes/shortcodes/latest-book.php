<?php 
/**
 * Latest book shortcode
 *
 */

function fooz_latest_book_shortcode() {
    
    $args = array(
        'post_type'      => 'books', 
        'posts_per_page' => 1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    // Retrieving the last custom post
    $latest_book_query = new WP_Query($args);

       if ($latest_book_query->have_posts()) {
       
        ob_start();
        
        while ($latest_book_query->have_posts()) {
            $latest_book_query->the_post();
            
           
            echo '<h2><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
            echo '<div>' . get_the_excerpt() . '</div>'; 
        }

        //Restores the global post object
        wp_reset_postdata();

        // Returns the cached content
        return ob_get_clean();
    } 
}

add_shortcode('latest_book', 'fooz_latest_book_shortcode');