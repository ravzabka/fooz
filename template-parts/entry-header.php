<header class="entry-header has-text-align-center">

    <div class="entry-header-inner section-inner medium">

        <h1><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()) { ?>
        <div class="book-thumbnail">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <?php } ?>


        <div class="book-meta">

            <?php
                    // View Category (Taxonomy)
                    $terms = get_the_terms(get_the_ID(), 'genre'); 
                    if ($terms && !is_wp_error($terms)) {
                        echo '<p><strong>' . __('Kategoria:', 'fooz') . '</strong> ';
                        $term_links = array();
                        foreach ($terms as $term) {
                            $term_links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                        }
                        echo implode(', ', $term_links);
                        echo '</p>';
                    }

                      // Display author from meta box
            $author_name = get_post_meta(get_the_ID(), '_book_author', true);
            if ($author_name) {
                echo '<p><strong>' . __('Autor:', 'fooz') . '</strong> ' . esc_html($author_name) . '</p>';
            }
                    ?>

        </div>
        <p><?php _e('Data publikacji:', 'fooz'); ?><?php echo get_the_date(); ?></p>

    </div><!-- .entry-header-inner -->

</header><!-- .entry-header -->