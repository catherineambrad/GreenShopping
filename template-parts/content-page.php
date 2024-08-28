<?php get_header(); ?>

<main class="page-main ">
    <?php the_content(); ?>

    <?php
        if ( comments_open() ) {
            comments_template( '/inc/comments/comments-form.php' );
        }
    ?>
</main>
<?php get_footer(); ?>
