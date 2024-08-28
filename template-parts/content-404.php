<?php global $lang_content;?>
<?php get_header(); ?>
<main class="page-404">
    <div class="container">
        <h1 class="page-404__title"><?= __( '404' ) ?></h1>
        <h4 class="page-404__subtitle"><?php echo $lang_content['page_404_subtitle'] ?></h4>
        <a href="<?= home_url() ?>" class="btn btn--green page-404__button"><?php echo $lang_content['page_404_homepage_button']?></a>
    </div>
</main>
<?php get_footer(); ?>
