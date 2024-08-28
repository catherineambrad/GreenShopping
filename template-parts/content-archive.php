<?php get_header(); ?>
<main class="page-archive">



	<?php if ( have_posts() ): ?>

        <div class="show-posts">
            <div class="columns col-4 align-stretch">
                <div class="mostbetazer-container">
                    <div class="columns__container">
						<?php while ( have_posts() ): the_post(); ?>
                            <div class="columns__item">
                                <article class="show-posts__item">
                                    <div class="show-posts__image">
										<?php
										$thumbnail_id = get_post_thumbnail_id( $post->ID );
										echo get_image( $thumbnail_id );
										?>
                                    </div>
                                    <h3 class="show-posts__title"><?= $post->post_title ?></h3>
                                    <p class="show-posts__text"><?= $post->post_excerpt ?></p>
                                    <a href="<?= get_permalink( $post ) ?>" class="show-posts__hidden-link"></a>
                                </article>
                            </div>
						<?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
