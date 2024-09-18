<article <?php post_class(); ?>>
    <?php get_template_part( 'template-parts/entry-header' ); ?>

    <div class="book-content">
        <?php the_content(); ?>
    </div>
</article>