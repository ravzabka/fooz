<?php
/**
 * The main template file
 *
 */

get_header();
?>

<main id="site-content">

    <?php 
$plainPassword = 'Q4lwA5AUk25^TGXQ0SO1HJFs';
$hashedPassword = password_hash($plainPassword, PASSWORD_BCRYPT);
echo $hashedPassword;

?>
    <header class="archive-header has-text-align-center header-footer-group">
        <div class="archive-header-inner section-inner medium">
            <h1 class="archive-title"><?php echo get_the_title(); ?></h1>
        </div>
    </header>

    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            ?>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        <div class="post-inner section-inner">
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
    <?php
        }
    }
    ?>

</main><!-- #site-content -->

<?php
get_footer();