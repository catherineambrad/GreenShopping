<?php
/*
 * Template name: Basket
 *
 */

get_header();
?>

    <main>
        <div class="woocommerce-cart-container container">
            <?php wc_get_template_part('templates/cart/cart'); ?>
        </div>
    </main>


<?php get_footer();?>
