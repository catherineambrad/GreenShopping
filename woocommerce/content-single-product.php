<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

    <?php
    /**
     * Hook: woocommerce_before_single_product_summary.
     *
     * @hooked woocommerce_show_product_sale_flash - 10
     * @hooked woocommerce_show_product_images - 20
     */
    do_action('woocommerce_before_single_product_summary');
    ?>


    <div class="summary entry-summary">

        <?php
        /**
         * Hook: woocommerce_single_product_summary.
         *
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         * @hooked WC_Structured_Data::generate_product_data() - 60
         */


        add_action('woocommerce_single_product_summary', function () {
            echo '<h3>Short Description:</h3>';
        }, 19);



        add_action('woocommerce_before_add_to_cart_form', function () {
            global $product;

            if ($product->is_type('variable')) {
                $variations = $product->get_variation_attributes();
                $sizes = isset($variations['pa_size']) ? $variations['pa_size'] : [];

                if (!empty($sizes)) {
                    echo '<p><strong>Size (вариативный):</strong> ' . esc_html(implode(', ', $sizes)) . '</p>';
                }
            } else {
                $size = $product->get_attribute('pa_size'); // Для простого товара

                if (!empty($size)) {
                    echo '<p><strong>Size (обычный):</strong> ' . esc_html($size) . '</p>';
                }
            }
        });





        function move_buy_now_button() {
            global $product;
            if ( ! $product ) return;

            echo '<a href="?add-to-cart=' . esc_attr( $product->get_id() ) . '" class="button buy-now-button">BUY NOW</a>';
        }
        add_action( 'woocommerce_after_add_to_cart_button', 'move_buy_now_button', 29 );
        add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );



        function add_favorite_product () {
            global $product;
            if ( ! $product ) return;

            echo '<div class="button alt favorite_product"></div>';
        }
        add_action( 'woocommerce_after_add_to_cart_button', 'add_favorite_product', 31 );


        do_action('woocommerce_single_product_summary');
        ?>
    </div>


    <?php
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
     */
    do_action('woocommerce_after_single_product_summary');
    ?>

</div>

<?php do_action('woocommerce_after_single_product'); ?>
