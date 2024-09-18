<?php 

/**
 * Add author meta to custom post type books
 *
 */


function fooz_add_author_meta_box() {
    add_meta_box(
        'book_author_meta_box',
        __('Autor Książki', 'fooz'),
        'render_author_meta_box',
        'books', 
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'fooz_add_author_meta_box');

function fooz_render_author_meta_box($post) {
  
    $author = get_post_meta($post->ID, '_book_author', true);
    ?>
<label for="book_author"><?php _e('Wprowadź autora książki:', 'fooz'); ?></label>
<input type="text" id="book_author" name="book_author" value="<?php echo esc_attr($author); ?>" style="width: 100%;" />
<?php
}


function fooz_save_author_meta_box($post_id) {
   
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['book_author'])) {
        update_post_meta($post_id, '_book_author', sanitize_text_field($_POST['book_author']));
    }
}
add_action('save_post', 'fooz_save_author_meta_box');