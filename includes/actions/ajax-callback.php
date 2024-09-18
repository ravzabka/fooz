<?php
/**
 * Ajax callback display 20 recent custom post from books
 *
 */

// Register the AJAX actions
add_action('wp_ajax_get_books', 'fooz_books_callback');
add_action('wp_ajax_nopriv_get_books', 'fooz_books_callback');

function fooz_books_callback() {
    // Query for the books
    $args = array(
        'post_type'      => 'books', // Adjust the post type if needed
        'posts_per_page' => 20,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    $query = new WP_Query($args);
    $books = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            // Get the genre terms
            $genres = wp_get_post_terms(get_the_ID(), 'genre');
            $genre_names = wp_list_pluck($genres, 'name');
            
            $books[] = array(
                'name'   => get_the_title(),
                'date'   => get_the_date('Y-m-d'), // Format date as needed
                'genre'  => implode(', ', $genre_names),
                'excerpt'=> get_the_excerpt()
            );
        }
    }

    // Reset post data
    wp_reset_postdata();

    // Return JSON response
     wp_send_json($books);
}