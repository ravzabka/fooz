<?php 

/**
 * The template for displaying archive genre.
 *
 */


get_header(); ?>

<div class="post-inner section-inner">
    <div class="entry-content">
        <h2><?php single_term_title();?></h2>

        <?php



    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'books',
        'posts_per_page' => 5, // Pagination settings
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'genre',
                'field'    => 'slug',
                'terms'    => get_queried_object()->slug,
            ),
        ),
    );

    $books_query = new WP_Query($args);

    if ($books_query->have_posts()) {
            while ($books_query->have_posts()) { $books_query->the_post(); ?>

        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>


        <?php } 

   
$big = 999999999; //unique number for replacement
echo paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '?paged=%#%',
    'current' => max(1, get_query_var('paged')),
    'total' => $books_query->max_num_pages
));
?>
    </div>
</div>


<?php  
}

// Reset postdata
wp_reset_postdata();
?>

<?php get_footer(); ?>