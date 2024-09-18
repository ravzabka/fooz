<?php
/**
 * Register the `books ` post type.
 */

 function fooz_books_custom_post_type() {
    // Set UI labels for the Custom Post Type
    $labels = array(
        'name'                  => _x('Books', 'Post type general name', 'fooz'),
        'singular_name'         => _x('Book', 'Post type singular name', 'fooz'),
        'menu_name'             => _x('Library', 'Admin Menu text', 'fooz'),
        'name_admin_bar'        => _x('Book', 'Add New on Toolbar', 'fooz'),
        'add_new'               => __('Add New Book', 'fooz'),
        'add_new_item'          => __('Add New Book', 'fooz'),
        'new_item'              => __('New Book', 'fooz'),
        'edit_item'             => __('Edit Book', 'fooz'),
        'view_item'             => __('View Book', 'fooz'),
        'all_items'             => __('All Books', 'fooz'),
        'search_items'          => __('Search Books', 'fooz'),
        'parent_item_colon'     => __('Parent Books:', 'fooz'),
        'not_found'             => __('No books found.', 'fooz'),
        'not_found_in_trash'    => __('No books found in Trash.', 'fooz'),
        'archives'              => __('Book Archives', 'fooz'),
        'insert_into_item'      => __('Insert into book', 'fooz'),
        'uploaded_to_this_item' => __('Uploaded to this book', 'fooz'),
        'filter_items_list'     => __('Filter books list', 'fooz'),
        'items_list_navigation' => __('Books list navigation', 'fooz'),
        'items_list'            => __('Books list', 'fooz'),
    );
     
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'library'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );
     
    register_post_type('books', $args);
}
add_action('init', 'fooz_books_custom_post_type');

function fooz_genre_taxonomy() {
    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'                       => _x('Genres', 'taxonomy general name', 'fooz'),
        'singular_name'              => _x('Genre', 'taxonomy singular name', 'fooz'),
        'search_items'               => __('Search Genres', 'fooz'),
        'popular_items'              => __('Popular Genres', 'fooz'),
        'all_items'                  => __('All Genres', 'fooz'),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __('Edit Genre', 'fooz'),
        'update_item'                => __('Update Genre', 'fooz'),
        'add_new_item'               => __('Add New Genre', 'fooz'),
        'new_item_name'              => __('New Genre Name', 'fooz'),
        'separate_items_with_commas' => __('Separate genres with commas', 'fooz'),
        'add_or_remove_items'        => __('Add or remove genres', 'fooz'),
        'choose_from_most_used'      => __('Choose from the most used genres', 'fooz'),
        'not_found'                  => __('No genres found.', 'fooz'),
        'menu_name'                  => __('Genres', 'fooz'),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array('slug' => 'book-genre'),
    );
    
    register_taxonomy('genre', 'books', $args);
}
add_action('init', 'fooz_genre_taxonomy');