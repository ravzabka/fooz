<?php 
/**
 * The number of posts to display from a given taxonomy
 *
 */

function fooz_recent_posts_by_genre_shortcode($atts) {
    // Establishing default attributes
    $atts = shortcode_atts(
        array(
            'genre_id' => '', // Default taxonomy ID, left blank
        ), 
        $atts
    );
   
    $args = array(
        'post_type'      => 'books',
        'posts_per_page' => 5,
        'orderby'        => 'title',
        'order'          => 'ASC', 
        'tax_query'      => array(
            array(
                'taxonomy' => 'genre', 
                'field'    => 'term_id', 
                'terms'    => $atts['genre_id'],
            ),
        ),
    );

    $query = new WP_Query($args);
      if ($query->have_posts()) {
      
        ob_start();
        
        echo '<ul>';
        while ($query->have_posts()) {
            $query->the_post();
             echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
        }

        echo '</ul>';

        // Restores the global post object
        wp_reset_postdata();

        // Returns the cached content
        return ob_get_clean();
    } 
}

add_shortcode('recent_posts_by_genre', 'fooz_recent_posts_by_genre_shortcode');