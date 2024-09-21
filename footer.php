<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package greenshop
 */

$add_list_advantages = get_field('add_list_advantages', 'option');
$add_join_newsletters = get_field('add_join_newsletters', 'option');
$join_newsletters = get_field('join_newsletters', 'option');
$add_information = get_field('add_join_newsletters', 'option');
$add_social_media = get_field('add_social_media', 'option');
$social_media = get_field('social_media', 'option');
$add_payments = get_field('add_payments', 'option');
$payments = get_field('payments', 'option');
$copywrite = get_field('copywrite', 'option');


function display_footer_menu($menu_location)
{
    $locations = get_nav_menu_locations();

    if (isset($locations[$menu_location])) {

        $menu_id = $locations[$menu_location];

        $menu_items = wp_get_nav_menu_items($menu_id);

        if ($menu_items && is_array($menu_items)) {
            echo '<ul class="flex flex-col gap-3 pt-2 text-sm text-grey">';
            foreach ($menu_items as $item) {
                echo '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
            }
            echo '</ul>';
        }
    }
}

?>

<footer class="footer mt-8 pt-12">
    <?php if ($add_list_advantages || $add_join_newsletters) : ?>
        <div class="footer-inner container flex gap-x-12 mb-8">
            <?php if ($add_list_advantages) : ?>
                <ul class="flex gap-x-6">
                    <?php while (have_rows('list_advantages', 'option')) : the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        ?>
                        <li class="border-r border-text-grey pr-6">
                            <?php if (!empty($image)) : ?>
                                <img class="mb-4" src="<?php echo esc_url($image['url']); ?>"
                                     alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                            <?php if (!empty($title)) : ?>
                                <div class="font-bold mb-2 text-lg text-dark-grey"><?php echo $title; ?></div>
                            <?php endif; ?>
                            <?php if (!empty($description)) : ?>
                                <p class="text-sm text-grey"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php if ($add_join_newsletters) : ?>
                <div class="footer_join_newsletters">
                    <div class="font-bold mb-2 text-lg text-dark-grey"><?php echo $join_newsletters['title']; ?></div>
                    <div class="flex  shadow-lg bg-white rounded-[6px] overflow-hidden my-[17px]">
                        <input type="text" class="outline-none border-0 bg-transparent w-full p-[12px]"
                               placeholder="enter your email address...">
                        <button class="py-3 px-6 bg-[#46A358] font-bold text-white">Join</button>
                    </div>
                    <p class="text-sm text-grey"><?php echo $join_newsletters['description']; ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($add_information) : ?>
        <div class="footer-information flex container gap-20 py-6">
            <?php
            the_custom_logo();
            ?>
            <?php while (have_rows('list_information', 'option')) : the_row();
                $icon = get_sub_field('icon');
                $link = get_sub_field('link');
                ?>
                <a href="<?php echo $link['url']; ?>" class="flex gap-4 text-sm text-grey items-center">
                    <?php if (!empty($image)) : ?>
                        <img class="" src="<?php echo esc_url($icon['url']); ?>"
                             alt="<?php echo esc_attr($icon['alt']); ?>">
                    <?php endif; ?>
                    <?php echo $link['title']; ?>
                </a>

            <?php endwhile; ?>
        </div>
    <?php endif; ?>

    <div class="footer-container-bottom container mt-8 flex justify-between">
        <div class="footer-container  grid grid-cols-3 gap-20">
            <?php if (has_nav_menu('my-account-menu')) : ?>
                <div class="footer-column">
                    <h3 class="footer-menu--title text-dark-grey font-bold text-lg">My Account</h3>
                    <?php display_footer_menu('my-account-menu'); ?>
                </div>
            <?php endif; ?>
            <?php if (has_nav_menu('help-guide-menu')) : ?>
                <div class="footer-column">
                    <h3 class="footer-menu--title text-dark-grey font-bold text-lg">Help & Guide</h3>
                    <?php display_footer_menu('help-guide-menu'); ?>
                </div>
            <?php endif; ?>
            <?php if (has_nav_menu('categories-menu')) : ?>
                <div class="footer-column">
                    <h3 class="footer-menu--title text-dark-grey font-bold text-lg mb-2">Categories</h3>
                    <?php display_footer_menu('categories-menu'); ?>
                </div>
            <?php endif; ?>
        </div>
        <?php if ($add_payments || $add_social_media) : ?>
            <div class="footer-bottom-inf">
                <?php if ($add_social_media) : ?>
                    <div class="footer_social_media container">
                        <p class="text-dark-grey font-bold text-lg mb-4"><?php echo $social_media['title']; ?></p>
                        <div class="flex gap-2 footer_social_media-list">
                            <?php
                            if ($social_media && isset($social_media['list']) && is_array($social_media['list'])):
                                foreach ($social_media['list'] as $item):
                                    $icon = $item['image'];
                                    $link = $item['link'];
                                    ?>
                                    <?php if (!empty($icon) && !empty($link)): ?>
                                    <a href="<?php echo esc_url($link); ?>"
                                       class="border p-2 flex items-center rounded">
                                        <img class="" src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_attr($icon['alt']); ?>">
                                    </a>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($add_payments) : ?>
                    <div class="footer_social_media container mt-8">
                        <p class="text-dark-grey font-bold text-lg mb-4"><?php echo $payments['title']; ?></p>
                        <div class="flex gap-2 footer_social_media-list">
                            <?php
                            if ($payments && isset($payments['list']) && is_array($payments['list'])):
                                foreach ($payments['list'] as $item):
                                    $icon = $item['image'];
                                    // Убираем проверку на $link, так как у платежных систем только иконки
                                    if (!empty($icon)): ?>
                                        <img class="" src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_attr($icon['alt']); ?>">
                                    <?php endif;
                                endforeach;
                            endif;
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($copywrite)) : ?>
        <div class="footer_copywrite  bg-white border-t border-green-200 text-sm mt-8 py-4 text-center">
            ©<?php echo date('Y'); ?><?php echo $copywrite; ?>
        </div>
    <?php endif; ?>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
